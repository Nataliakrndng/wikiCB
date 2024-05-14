<?php

use App\Http\Controllers\Back\DashController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ArticlesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/articles', [ArticlesController::class,'index']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashController::class, 'index']);

    Route::resource('/categories', CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ])->middleware('UserAccess:1');

    Route::resource('/article', ArticleController::class);

    Route::resource('/users', UserController::class);

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
