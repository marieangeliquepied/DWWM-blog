<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index() {
        $articles = Article::with(['category'])
        ->latest('created_at')
        ->paginate(5);

        return view('admin-articles', compact('articles'));
    }

    public function getArticleById(int $id) {
        // Récupère l'article avec sa catégorie, peu importe son statut (DRAFT ou PUBLISHED)
        $article = Article::with(['category'])->findOrFail($id);

        // On retourne directement l'objet (Laravel va le convertir automatiquement en JSON)
        return response()->json($article);
    }

    public function create()
    {
        $article = new Article();
        $categories = Category::orderBy('name')->get();

        return view('admin-article-form', compact('article', 'categories'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = $this->makeUniqueSlug($data['title']);

        if ($data['status'] === 'PUBLISHED') {
            $data['published_at'] = now();
        }

        Article::create($data);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin-article-form', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        $data['slug'] = $this->makeUniqueSlug($data['title'], $article->id);

        if ($data['status'] === 'PUBLISHED' && $article->status !== 'PUBLISHED') {
            $data['published_at'] = now();
        } elseif ($data['status'] === 'DRAFT') {
            $data['published_at'] = null;
        }

        $article->update($data);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article modifié avec succès.');
    }

    private function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $i = 2;

        while (Article::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$original}-{$i}";
            $i++;
        }

        return $slug;
    }
}