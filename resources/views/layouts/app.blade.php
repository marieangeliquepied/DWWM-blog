<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white p-6 max-w-5xl mx-auto">
    
    <div class="auth-bar">
        <a href="{{ route('register') }}" class="auth-link">
            S'incrire
        </a>
        <a href="{{ route('login') }}" class="auth-link">
            Se connecter
        </a>
    </div>

    <div>
        @yield('content')
    </div>

</body>

</html>