<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Skill\StoreRequest;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Skill;

class SkillController extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());

        return redirect()->route('skills.index');
    }

    public function update(Skill $skill, StoreRequest $request)
    {
        $skill->update($request->validated());

        return redirect()->route('skills.index');
    }
}
