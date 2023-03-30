<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\Video\StoreRequest;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\Video\UpdateRequest;

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
        $file = $request->file('image');
        $fileName = time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);

        $requestArray = $request->all();
        $video = $this->model->create(['user_id' => auth()->id(), 'image' => $fileName] + $request->validated());
        $this->syncTagsSkills($video, $requestArray);

        return redirect()->route('videos.index');
    }

    public function update(Video $video, UpdateRequest $request)
    {
        $requestArray = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $request = ['image' => $fileName] + $request->validated();
            $this->syncTagsSkills($video, $requestArray);
            $video->update($request);
        } else {
            $this->syncTagsSkills($video, $requestArray);
            $video->update($request->validated());
        }


        return redirect()->route('videos.index');
    }

    public function syncTagsSkills($video, $requestArray)
    {
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $video->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $video->tags()->sync($requestArray['tags']);
        }
    }
}
