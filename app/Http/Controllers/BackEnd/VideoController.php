<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Video\StoreRequest;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
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
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
        ];

        if (request()->route()->parameter('video')) {
            $array['selectedSkills'] = $this->model->find(request()->route()->parameter('video'))->skills()->pluck('skills.id')->toArray();
            $array['selectedTags'] = $this->model->find(request()->route()->parameter('video'))->tags()->pluck('tags.id')->toArray();
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
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $video->tags()->sync($requestArray['tags']);
        }

        return redirect()->route('videos.index');
    }

    public function update(Video $video, StoreRequest $request)
    {
        $requestArray = $request->all();
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $video->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $video->tags()->sync($requestArray['tags']);
        }

        $video->update($request->validated());

        return redirect()->route('videos.index');
    }
}
