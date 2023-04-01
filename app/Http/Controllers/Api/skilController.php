<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Skill\StoreRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;

class skilController extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {
        $skill = $this->model->create($request->validated());
        if ($skill) {
            return $this->apiResponse(new SkillResource($skill));
        }
        return $this->notFoundResponse();
    }

    public function update(Skill $skill, StoreRequest $request)
    {
        if (!$skill) {
            return $this->notFoundResponse();
        }
        $skill->update($request->validated());
        return $this->apiResponse(SkillResource::make($skill));
    }
}
