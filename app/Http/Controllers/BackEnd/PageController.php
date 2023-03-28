<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Page;
use App\Http\Requests\Page\StoreRequest;
use App\Http\Controllers\BackEnd\BackEndController;

class PageController extends BackEndController
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('pages.index');
    }

    public function update(Page $page, StoreRequest $request)
    {
        $page->update($request->validated());

        return redirect()->route('pages.index');
    }
}
