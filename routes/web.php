<?php

use App\Http\Controllers\Back\DashController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\EditorController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ArticlesController;
use App\Http\Controllers\Front\CategoriesController;
use App\Http\Controllers\Front\PagesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::post('/articles/search', [ArticlesController::class, 'index'])->name('search');

Route::get('/articles', [ArticlesController::class,'index']);

Route::get('/category/{slug}/', [CategoriesController::class, 'index']);
Route::get('/articles/{slug}', [PagesController::class, 'show']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashController::class, 'index']);

    Route::resource('/categories', CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);

    Route::resource('/article', ArticleController::class);

    Route::resource('/users', UserController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
