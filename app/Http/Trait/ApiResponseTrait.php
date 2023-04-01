<?php

namespace App\Http\Trait;

trait ApiResponseTrait
{
    /* response shape 
        [
            'data' =>
            'status' => true, false
            'error' =>
        ]
        */
    public $paginateNumber = 10;

    public function apiResponse($data = null, $error = null, $code = 200)
    {
        $array = [
            'data' => $data,
            'status' => in_array($code, $this->successCode()) ? true : false,
            'error' => $error
        ];
        return response()->json($array, $code);
    }

    public function successCode()
    {
        return [
            200, 201, 202
        ];
    }

    public function notFoundResponse()
    {
        return $this->apiResponse(null, 'not found', 404);
    }
}
