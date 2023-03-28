<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BackEnd\BackEndController;

class HomeController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        return view('back-end.home');
    }
}
