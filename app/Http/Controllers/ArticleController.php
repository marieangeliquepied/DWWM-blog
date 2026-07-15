<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller{
    // Pour afficher la LISTE de tous les articles
    public function index(): View {
        $articles = Article::all();

        return view('articles-list', ['articles' => $articles]);
    }
    // Pour afficher le DÉTAIL d'un seul article
    public function show(int $id): View {
        $article = Article::with(['category'])->findOrFail($id);

        return view('article-detail', compact('article'));
    }
};