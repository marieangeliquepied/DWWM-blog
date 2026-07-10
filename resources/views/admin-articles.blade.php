<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles admin</title>
    <!-- On garde Tailwind pour la cohérence des bordures rectangulaires -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<script src="https://unpkg.com/lucide@latest"></script>

<body class="bg-white p-6 max-w-6xl mx-auto">

    @extends('layouts.app')
    @section('content')

    <h1 class="text-2xl font-sans text-gray-800 mb-6">Articles admin</h1>        
        <div class="font-sans">
            <!-- En-tête de section -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl text-gray-800">Articles</h1>
                <button class="bg-black text-white text-xs font-bold px-4 py-2 uppercase tracking-wide">
                    + Nouvel article
                </button>
            </div>

            <!-- Tableau des articles -->
            <div class="border border-gray-400 bg-white">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-400 text-sm text-gray-600 bg-gray-50">
                            <th class="p-3 font-normal">Titre</th>
                            <th class="p-3 font-normal">Catégorie</th>
                            <th class="p-3 font-normal">Statut</th>
                            <th class="p-3 font-normal">Date</th>
                            <th class="p-3 font-normal text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-200">
                        @foreach($articles as $article)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-black font-medium">
                                    <div class="truncate max-w-[250px]" title="{{ $article->title }}">
                                        {{ $article->title }}
                                    </div>
                                </td>
                                <td class="p-3 text-gray-600">{{ $article->category->name }}</td>
                                <td class="p-3">
                                    <div class="flex items-center gap-2">
                                        @if($article->status === 'PUBLISHED')
                                            <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                                            <span>Publié</span>
                                        @else
                                            <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
                                            <span>Brouillon</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-3 text-gray-600">
                                    {{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}
                                </td>
                                <!-- Placeholders pour les actions CRUD de la maquette -->
                                <td class="p-3 text-right text-base whitespace-nowrap space-x-3">
                                        <button title="Modifier"><i data-lucide="pencil" class="w-5 h-5 text-gray-600 hover:text-blue-600"></i></button>
                                        <button title="Supprimer"><i data-lucide="trash-2" class="w-5 h-5 text-gray-600 hover:text-red-600"></i></button>
                                    @if($article->status !== 'PUBLISHED')
                                        <button title="Publier"><i data-lucide="send" class="w-5 h-5 text-gray-600 hover:text-green-600"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
<script>lucide.createIcons();</script>
@endsection
</body>
</html>