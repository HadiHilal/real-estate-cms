<?php

namespace Modules\Blog\app\Repositories;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use Modules\Blog\app\Http\Requests\BlogPostRequest;
use Modules\Blog\app\Models\BlogPost;
use Modules\Blog\app\Notifications\NotifySubscribers;
use Modules\Core\app\Traits\FileTrait;
use Modules\Page\app\Models\Page;
use Modules\Subscriber\app\Models\Subscriber;

class PostModelRepository implements PostRepository
{
    use FileTrait;

    private string $postUploadPath = 'posts';

    public function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator
    {
        return BlogPost::select($columns)
            ->when($request->has('publish') and $request->query('publish'), function ($q) use ($request) {
                $q->where('publish', $request->query('publish'));
            })->paginate(Config::get('core.page_size'));
    }

    public function store(BlogPostRequest $request): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->postUploadPath, $request->input('slug'));
        } else {
            session()->flash('error', __('The Client Image Is Required'));
            return false;
        }
        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ', $valuesArray);

        $request->merge([
            'image' => $path,
            'keywords' => $keywords,
            'publish' => $request->has('publish') ? 'published' : 'archived',
            'featured' => $request->has('featured') ? 1 : 0,
        ]);
        try {
            $blogPost = BlogPost::create($request->all());
            if ($request->has('notification')) {
                $subscribers = Subscriber::all();
                Notification::send($subscribers, new NotifySubscribers($blogPost));
            }
            cache()->forget('posts');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(BlogPostRequest $request, BlogPost $post): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->postUploadPath, $request->input('slug'), $post->image);
            $request->merge([
                'image' => $path,
            ]);
        }
        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ', $valuesArray);

        $request->merge([
            'keywords' => $keywords,
            'publish' => $request->has('publish') ? 'published' : 'archived',
            'featured' => $request->has('featured') ? 1 : 0,
        ]);
        try {
            $post->update($request->all());
            cache()->forget('posts');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $postImages = Page::whereIn('id', $ids)->pluck('image')->toArray();
            BlogPost::destroy($ids);
            $this->deleteFile($postImages);
            cache()->forget('posts');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }
}
