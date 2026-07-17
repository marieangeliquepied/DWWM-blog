@extends('layouts.app')

@section('title', $article->exists ? 'Modifier l\'article' : 'Créer un article')

@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <a href="{{ route('admin.articles.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
            ← Retour à la liste
        </a>

        <form action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
              method="POST" class="mt-6 space-y-6">
            @csrf
            @if($article->exists)
                @method('PUT')
            @endif

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titre *</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title', $article->title) }}"
                       class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-black focus:ring-black">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie *</label>
                <select name="category_id" id="category_id"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-black focus:ring-black">
                    <option value="">Sélectionner une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- TODO : sélection des tags, une fois la table tags créée --}}

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu *</label>
                <textarea name="content" id="content" rows="8"
                          class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-black focus:ring-black">{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <span class="block text-sm font-medium text-gray-700 mb-2">Statut</span>
                <div class="flex gap-6">
                    <label class="flex items-center gap-2 text-sm text-gray-700">
                        <input type="radio" name="status" value="DRAFT"
                            {{ old('status', $article->status ?: 'DRAFT') === 'DRAFT' ? 'checked' : '' }}
                            class="text-black focus:ring-black">
                        Brouillon
                    </label>
                    <label class="flex items-center gap-2 text-sm text-gray-700">
                        <input type="radio" name="status" value="PUBLISHED"
                            {{ old('status', $article->status) === 'PUBLISHED' ? 'checked' : '' }}
                            class="text-black focus:ring-black">
                        Publié
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.articles.index') }}"
                   class="px-4 py-2 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-50">
                    Annuler
                </a>
                <button type="submit"
                        class="px-4 py-2 rounded-md bg-black text-white text-sm hover:bg-gray-800">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
@endsection