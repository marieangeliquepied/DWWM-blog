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
                        <td class="p-3 text-black font-medium">{{ $article->title }}</td>
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
                            {{ $article->published_at ? $article->published_at->format('d/m/Y') : '-' }}
                        </td>
                        <!-- Placeholders pour les actions CRUD de la maquette -->
                        <td class="p-3 text-right space-x-3 text-base">
                            <button title="Modifier">✏️</button>
                            <button title="Supprimer">❌</button>
                            @if($article->status !== 'PUBLISHED')
                                <button title="Publier">✈️</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>