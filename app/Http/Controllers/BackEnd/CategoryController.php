<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Controllers\BackEnd\BackEndController;

class CategoryController extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('categories.index');
    }

    public function update(Category $category, StoreRequest $request)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index');
    }
}
