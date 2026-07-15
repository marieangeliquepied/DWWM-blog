@extends('layouts.app')

@section('titre', $article->title)

@section('content')

<!-- Bouton retour à la liste des articles -->
<a href="{{ route('articles.index') }}" class="text-sm underline text-gray-600 hover:text-black">
    ← Retour à la liste
</a>

<!-- Affichage de la catgégorie et de la date -->
<div class="flex justify-between items-center text-sm text-gray-600 mb-4">
    <div class="flex gap-2">
        <span class="font-medium">[ {{ $article->category->name }} ]</span>
        <span>[ Tag 1 ]</span>
    </div>
    <div>
        {{ $article->published_at ? $article->published_at->format('d jan. Y') : $article->created_at->format('d jan. Y') }}
    </div>
</div>

<!-- Affichage du titre de l'article et de l'auteur -->
 <h1 class="text-3xl font-bold text-black mb-2">
    {{ $article->title }}
</h1>

<div class="text-sm text-gray-500 mb-6">
    Par {{ $article->user->name ?? 'Auteur anonyme' }}
</div>

<!-- Contenu de l'article -->
 <div class="text-gray-800 text-base leading-relaxed whitespace-pre-line">
    {{ $article->content }}
</div>

@endsection