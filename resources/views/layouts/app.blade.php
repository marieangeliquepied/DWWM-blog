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
        <a href="" class="auth-link">
            S'incrire
        </a>
        <a href="" class="auth-link">
            Se connecter
        </a>
    </div>

    <div style="background-color: tomato">
        @yield('content')
    </div>

</body>

</html>