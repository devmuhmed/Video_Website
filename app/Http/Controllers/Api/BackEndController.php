<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Trait\ApiResponseTrait;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{
    use ApiResponseTrait;
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
        $with = $this->getWith();
        if (!empty($with)) {
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate($this->paginateNumber);
        return $this->apiResponse($rows);
    }

    public function show($model)
    {
        $row = $this->model->findOrFail($model);
        if ($row) {
            return $this->apiResponse($row);
        }
        return $this->notFoundResponse();
    }

    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
        return $this->apiResponse($this->model);
    }

    protected function getWith()
    {
        return [];
    }
}
