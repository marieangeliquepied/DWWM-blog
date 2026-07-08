<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <!-- On garde Tailwind pour coller aux rectangles de la maquette -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white p-6 max-w-5xl mx-auto">

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
            <div class="border border-gray-400 p-6 bg-white">
                <!-- Ligne supérieure : Catégories/Tags à gauche, Date à droite -->
                <div class="flex justify-between items-center text-sm text-gray-600 mb-2">
                    <div class="flex gap-2">
                        <span>[ {{ $article->category->name }} ]</span>
                        <span>[ Tag 1 ]</span>
                    </div>
                    <div>
                        <!-- Affichage de la date de publication (ou de création si non publiée) -->
                        {{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}
                    </div>
                </div>

                <!-- Titre de l'article -->
                <h2 class="text-xl font-medium text-black mb-2">
                    {{ $article->title }}
                </h2>

                <!-- Contenu tronqué côté serveur -->
                <p class="text-gray-700 text-sm leading-relaxed mb-4">
                    {{ Str::limit($article->content, 180) }}
                </p>

                <!-- Lien Lire seul (Auteur masqué) -->
                <div class="text-right">
                    <a href="#" class="text-sm underline text-black hover:text-gray-600">Lire →</a>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>