<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/admin/articles', [AdminController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');