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
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/admin/articles', [AdminController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);

// Routes de test "Get by ID" côté admin
Route::get('/admin/api/articles/{id}', [AdminController::class, 'getArticleById']);
Route::get('/admin/api/categories/{id}', [CategoryController::class, 'getCategoryById']);


