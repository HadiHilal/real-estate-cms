<?php

namespace Modules\Page\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Core\app\Models\Country;
use Modules\Page\app\Http\Requests\PageRequest;
use Modules\Page\app\Models\Page;
use Modules\Page\app\Repositories\PageRepository;

class PageController extends Controller
{
    public function __construct(protected PageRepository $pageRepository)
    {
        $this->setActive('pages');
        $this->setActive('custom_pages');
    }

    public function index(Request $request)
    {
        $pages = $this->pageRepository->paginate($request, ['id', 'country_id', 'title', 'slug', 'image', 'type', 'publish', 'featured', 'visites', 'created_at']);

        return view('page::admin.index', compact('pages'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('page::admin.create', compact('countries'));
    }

    public function store(PageRequest $request): RedirectResponse
    {
        $this->flushMessage($this->pageRepository->store($request));
        return redirect()->to(route('admin.pages.index'));
    }


    public function edit(Page $page)
    {
        $countries = Country::all();
        return view('page::admin.edit', compact('page', 'countries'));
    }

    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $this->flushMessage($this->pageRepository->update($request, $page));
        return redirect()->to(route('admin.pages.index'));
    }

    public function deleteMulti(): RedirectResponse
    {
        $ids = request()->input('ids');
        $this->flushMessage($this->pageRepository->deleteMulti($ids));
        return redirect()->to(route('admin.pages.index'));
    }
}
