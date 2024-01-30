<?php

namespace Modules\Page\app\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Modules\Page\app\Http\Requests\PageRequest;
use Modules\Page\app\Models\Page;

interface PageRepository
{
    function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator;

    function store(PageRequest $request): bool;

    function update(PageRequest $request, Page $testimonial): bool;

    function deleteMulti(array $ids): bool;
}
