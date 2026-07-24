<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// Page d'accueil : Affiche directement la liste des articles
Route::get('/', [ArticleController::class, 'index'])->name('home');

// Routes pour les views côté user
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Routes pour les views côté admin
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

// Route pour supprimer un article
Route::delete('/admin/articles/{article}', [AdminController::class, 'destroy'])->name('admin.articles.destroy');

// CRUD Catégories Admin
Route::get('/admin/categories', [CategoryController::class, 'adminIndex'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

// Inscription
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Page et traitement de la connexion
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Déconnexion 
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');