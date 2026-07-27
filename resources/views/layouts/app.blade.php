<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white p-6 max-w-5xl mx-auto">
    
    <div class="auth-bar flex justify-end items-center gap-4 mb-6">
        {{-- 1. Quand l'utilisateur N'EST PAS connecté --}}
        @guest
            @if(!request()->routeIs('register', 'login'))
                <a href="{{ route('register') }}" class="auth-link hover:underline">
                    S'inscrire
                </a>
                <a href="{{ route('login') }}" class="auth-link hover:underline">
                    Se connecter
                </a>
            @endif
        @endguest

        {{-- 2. Quand l'utilisateur EST connecté --}}
        @auth
            <span class="text-sm font-medium">
                Bonjour {{ Auth::user()->firstname }}
            </span>

            {{-- Liens réservés à l'ADMIN --}}
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.articles.index') }}" class="text-sm hover:underline">
                    Gestion Articles
                </a>
                <a href="{{ route('admin.categories.index') }}" class="text-sm hover:underline">
                    Gestion Catégories
                </a>
            @endif

            {{-- Bouton de déconnexion --}}
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:underline">
                    Se déconnecter
                </button>
            </form>
        @endauth
    </div>

    <div class="max-w-5xl mx-auto px-6">
        {{-- Message d'erreur --}}
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Message de succès (utile pour plus tard) --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div>
        @yield('content')
    </div>

</body>

</html>