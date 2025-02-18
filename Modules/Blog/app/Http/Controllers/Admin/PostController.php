<?php

namespace Modules\Blog\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Blog\app\Http\Requests\BlogPostRequest;
use Modules\Blog\app\Models\BlogCategory;
use Modules\Blog\app\Models\BlogPost;
use Modules\Blog\app\Repositories\PostRepository;
use Modules\Core\app\Models\Country;

class PostController extends Controller
{
    public function __construct(protected PostRepository $postRepository)
    {
        $this->setActive('blogs');
        $this->setActive('posts');
    }

    public function index(Request $request)
    {
        $categories = BlogCategory::all();
        $posts = $this->postRepository->paginate($request, ['id', 'country_id', 'title', 'slug', 'image', 'publish', 'featured', 'category_id', 'citizenship', 'visites', 'created_at']);
        return view('blog::admin.posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('blog::admin.posts.create', compact('countries'));
    }

    public function store(BlogPostRequest $request): RedirectResponse
    {
        $this->flushMessage($this->postRepository->store($request));
        return redirect()->to(route('admin.blogs.posts.index'));
    }


    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::where('country_id', $post->country_id)->get();
        $countries = Country::all();
        return view('blog::admin.posts.edit', compact('post', 'categories', 'countries'));
    }

    public function update(BlogPostRequest $request, BlogPost $post): RedirectResponse
    {
        $this->flushMessage($this->postRepository->update($request, $post));
        return redirect()->to(route('admin.blogs.posts.index'));
    }

    public function deleteMulti(): RedirectResponse
    {
        $ids = request()->input('ids');
        $this->flushMessage($this->postRepository->deleteMulti($ids));
        return redirect()->to(route('admin.blogs.posts.index'));
    }

    public function getCat()
    {
        $countryId = request()->input('countryId');
        return BlogCategory::where('country_id', $countryId)->pluck('name', 'id')->toArray();
    }
}
