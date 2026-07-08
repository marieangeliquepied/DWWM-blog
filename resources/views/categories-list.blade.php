<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des catégories</title>
    <!-- On garde Tailwind pour la cohérence des bordures rectangulaires -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white p-6 max-w-xl mx-auto">

    <h1 class="text-2xl font-sans text-gray-800 mb-6">Liste des catégories</h1>

    <!-- Structure simple sous forme de liste bordée -->
    <div class="font-sans">
    <!-- En-tête de section -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl text-gray-800">Catégories</h1>
        <button class="bg-black text-white text-xs font-bold px-4 py-2 uppercase tracking-wide">
            + Nouvelle catégorie
        </button>
    </div>

    <!-- Tableau des catégories -->
    <div class="border border-gray-400 bg-white">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-400 text-sm text-gray-600 bg-gray-50">
                    <th class="p-3 font-normal">Nom</th>
                    <th class="p-3 font-normal">Articles</th>
                    <th class="p-3 font-normal">Date de création</th>
                    <th class="p-3 font-normal text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-200">
                @foreach($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <!-- Nom de la catégorie -->
                        <td class="p-3 text-black font-medium">{{ $category->name }}</td>
                        
                        <!-- Nombre d'articles -->
                        <td class="p-3 text-gray-600">
                            {{ $category->articles_count ?? $category->articles->count() }}
                        </td>
                        
                        <!-- Date de création -->
                        <td class="p-3 text-gray-600">
                            {{ $category->created_at ? $category->created_at->format('d/m/Y') : '-' }}
                        </td>
                        
                        <!-- Actions -->
                        <td class="p-3 text-right space-x-3 text-base">
                            <button title="Modifier">✏️</button>
                            <button title="Supprimer">❌</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>