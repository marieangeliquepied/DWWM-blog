<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller{
    // Pour afficher la LISTE de tous les articles
    public function index(): View {
        $articles = Article::with(['category'])
            ->where('status', 'PUBLISHED')
            ->latest('published_at')
            ->paginate(3);

        return view('articles-list', ['articles' => $articles]);
    }
    // Pour afficher le DÉTAIL d'un seul article
    public function show(string $slug): View {
        $article = Article::with(['category'])
            ->where('slug', $slug)
            ->where('status', 'PUBLISHED')
            ->firstOrFail();

        return view('article-detail', compact('article'));
    }
};