<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// --- PAGES PUBLIQUES (Tout le monde peut voir) ---
Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// --- AUTHENTIFICATION ---
Route::middleware('guest')->group(function() {
    Route::controller(RegisterController::class)->group(function (){
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login','create')->name('login');
        Route::post('/login', 'store');
    });
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// --- ESPACE ADMIN (Protégé par le middleware 'admin') ---
Route::middleware(['auth','admin'])->group(function () {
    
    // Articles Admin
    Route::get('/admin/articles', [AdminController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [AdminController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles', [AdminController::class, 'store'])->name('admin.articles.store');
    Route::get('/admin/articles/{article}/edit', [AdminController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/admin/articles/{article}', [AdminController::class, 'update'])->name('admin.articles.update');
    Route::delete('/admin/articles/{article}', [AdminController::class, 'destroy'])->name('admin.articles.destroy');

    // Catégories Admin
    Route::get('/admin/categories', [CategoryController::class, 'adminIndex'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // API Admin (Test)
    Route::get('/admin/api/articles/{id}', [AdminController::class, 'getArticleById']);
    Route::get('/admin/api/categories/{id}', [CategoryController::class, 'getCategoryById']);
});