<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreRequest;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\User\UpdateRequest;

class UserController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $this->model->create($data);

        return redirect()->route('users.index');
    }

    public function update(User $user, UpdateRequest $request)
    {
        $data = $request->validated();
        if ($request->has('password') && $request->get('password') != '') {
            $data->merge(['password' => Hash::make($request->password)]);
        }
        $user->update($data);

        return redirect()->route('users.index');
    }
}
