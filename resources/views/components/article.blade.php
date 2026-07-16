<div>
    <div class="border border-gray-400 p-6 bg-white">
        <!-- Ligne supérieure : Catégories/Tags à gauche, Date à droite -->
        <div class="flex justify-between items-center text-sm text-gray-600 mb-2">
            <div class="flex gap-2">
                <span>[ {{ $article->category->name }} ]</span>
                <span>[ Tag 1 ]</span>
            </div>
            <div>
                <!-- Affichage de la date de publication (ou de création si non publiée) -->
                {{ $article->published_at ? $article->published_at->format('d/m/Y') : 'Non publié' }}
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
                    <a href="{{ route('articles.show', $article->id) }}" class="text-sm underline text-black hover:text-gray-600">Lire →</a>
            </div>
    </div>
</div>