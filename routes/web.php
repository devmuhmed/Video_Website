<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackEnd\TagController;
use App\Http\Controllers\BackEnd\PageController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\SkillController;
use App\Http\Controllers\BackEnd\VideoController;
use App\Http\Controllers\BackEnd\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('frontend.landing');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('users', UserController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('skills', SkillController::class)->except('show');
    Route::resource('tags', TagController::class)->except('show');
    Route::resource('pages', PageController::class)->except('show');
    Route::resource('videos', VideoController::class)->except('show');
    Route::post('comments', [VideoController::class, 'commentStore'])->name('comments.store');
    Route::get('comments/{comment}', [VideoController::class, 'commentDelete'])->name('comments.destroy');
    Route::put('comments/{comment}', [VideoController::class, 'commentUpdate'])->name('comments.update');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('category/{category}', [HomeController::class, 'category'])->name('front.category');
Route::get('skill/{skill}', [HomeController::class, 'skills'])->name('front.skill');
