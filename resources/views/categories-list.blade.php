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
    <div class="border border-gray-400 font-sans bg-white">
        <ul class="divide-y divide-gray-400">
            @foreach ($categories as $category)
                <li class="p-4 flex justify-between items-center text-sm hover:bg-gray-50/50">
                    <!-- Nom de la catégorie -->
                    <span class="font-medium text-black">{{ $category->name }}</span>
                    
                    <!-- Identifiant (optionnel, mais pratique pour le dev) -->
                    <span class="text-xs text-gray-400 font-mono">ID: {{ $category->id }}</span>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>