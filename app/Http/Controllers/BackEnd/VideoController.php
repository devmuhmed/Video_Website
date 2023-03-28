<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Video\StoreRequest;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Category;
use App\Models\Skill;
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
        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'selectedSkills' => []
        ];

        if (request()->route()->parameter('video')) {
            $array['selectedSkills'] = $this->model->find(request()->route()->parameter('video'))->skills()->get()->pluck('id')->toArray();
        }
        return $array;
    }

    public function store(Video $video, StoreRequest $request)
    {
        $requestArray = $request->all();
        $video = $this->model->create($request->validated() + ['user_id' => auth()->id()]);

        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $video->skills()->sync($requestArray['skills']);
        }

        return redirect()->route('videos.index');
    }

    public function update(Video $video, StoreRequest $request)
    {
        $requestArray = $request->all();
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $video->skills()->sync($requestArray['skills']);
        }
        $video->update($request->validated());

        return redirect()->route('videos.index');
    }
}
