<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use GuzzleHttp\Promise\Create;

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/admin/articles', [AdminController::class, 'index'])->name('admin.articles.index');
Route::get('/categories', [CategoryController::class, 'index']);

// Routes de test "Get by ID" côté admin
Route::get('/admin/api/articles/{id}', [AdminController::class, 'getArticleById']);
Route::get('/admin/api/categories/{id}', [CategoryController::class, 'getCategoryById']);

// Routes pour créer, stocker, éditer, et modifier articles
Route::get('/admin/articles/create', [AdminController::class, 'create'])->name('admin.articles.create');
Route::post('/admin/articles', [AdminController::class, 'store'])->name('admin.articles.store');
Route::get('/admin/articles/{article}/edit', [AdminController::class, 'edit'])->name('admin.articles.edit');
Route::put('/admin/articles/{article}', [AdminController::class, 'update'])->name('admin.articles.update');