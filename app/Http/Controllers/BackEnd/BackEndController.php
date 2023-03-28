<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        if (!empty($with)) {
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(10);
        $with = $this->getWith();
        // dd($with);

        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $title = 'Control ' . $moduleName;
        $pageDesc = 'Here you can add / edit / delete' . $moduleName;
        $routeName = $this->getClassNameFromModel();

        return view('back-end.' . $routeName . '.index', compact('rows', 'title', 'sModuleName', 'moduleName', 'pageDesc', 'routeName'));
    }

    public function create()
    {
        $moduleName = $this->getModelName();
        $title = 'Create ' . $moduleName;
        $pageDesc = 'Here you can create ' . $moduleName;
        $routeName = $this->getClassNameFromModel();
        $append = $this->append();

        return view('back-end.' . $routeName . '.create', compact('title', 'moduleName', 'pageDesc', 'routeName'))->with($append);
    }

    public function edit($id)
    {
        $row = $this->model->findOrFail($id);

        $moduleName = $this->getModelName();
        $title = 'Edit ' . $moduleName;
        $pageDesc = 'Here you can edit ' . $moduleName;
        $routeName = $this->getClassNameFromModel();
        $append = $this->append();

        return view('back-end.' . $routeName . '.edit', compact('row', 'title', 'moduleName', 'pageDesc', 'routeName'))->with($append);
    }

    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel() . '.index');
    }

    protected function filter($rows)
    {
        return $rows;
    }

    protected function getWith()
    {
        return [];
    }

    protected function getModelName()
    {
        return class_basename($this->model);
    }

    protected function pluralModelName()
    {
        return Str::plural($this->getModelName());
    }

    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }

    protected function append()
    {
        return [];
    }
}
