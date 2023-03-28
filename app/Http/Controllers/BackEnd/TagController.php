<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Tag;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\Tag\StoreRequest;

class TagController extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('tags.index');
    }

    public function update(Tag $tag, StoreRequest $request)
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index');
    }
}
