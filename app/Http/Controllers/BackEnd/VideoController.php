<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Video\StoreRequest;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Category;
use App\Models\Video;

class VideoController extends BackEndController
{
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    protected function getWith()
    {
        return ['category', 'user'];
    }

    protected function append()
    {
        return [
            'categories' => Category::get(),
        ];
    }
    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated() + ['user_id' => auth()->id()]);

        return redirect()->route('videos.index');
    }

    public function edit($id)
    {
        $row = $this->model->findOrFail($id);

        $moduleName = $this->getModelName();
        $title = 'Edit ' . $moduleName;
        $pageDesc = 'Here you can edit ' . $moduleName;
        $routeName = $this->getClassNameFromModel();
        $categories = Category::get();

        return view('back-end.' . $routeName . '.edit', compact('row', 'title', 'moduleName', 'pageDesc', 'routeName', 'categories'));
    }

    public function update(Video $video, StoreRequest $request)
    {
        $video->update($request->validated());

        return redirect()->route('videos.index');
    }
}
