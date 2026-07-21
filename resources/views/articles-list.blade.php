    
    @extends('layouts.app')
    @section('title', 'Liste des articles')
    @section('content')


    <!-- Bloc Filtres (Statique) -->
    <div class="border border-gray-400 p-4 mb-6 flex items-center gap-4 text-sm font-sans">
        <span class="text-gray-700">Filtres :</span>
        <select class="border border-gray-400 px-3 py-1 bg-white rounded-none">
            <option>Toutes les catégories</option>
        </select>
        <select class="border border-gray-400 px-3 py-1 bg-white rounded-none">
            <option>Tous les tags</option>
        </select>
    </div>

    
    <!-- Liste des articles -->
    <div class="space-y-4 font-sans">
        @foreach ($articles as $article)
            <x-article :Article="$article"/>
            
        @endforeach
        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    </div>
    @endsection
