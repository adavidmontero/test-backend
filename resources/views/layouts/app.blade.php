<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>

    <title>Test Backend</title>
</head>
<body>
    <header>
        <a class="logo" href="/">all favorites</a>
        <span class="menu-button" id="menu-mobile">
            <svg class="hamburger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </span>
        <nav class="menu hidden">
            @auth
                <a href="{{ route('favorites.index') }}">Mis favoritos</a>
                <a href="{{ route('categories.index') }}">Mis categorías</a>
                <span> | </span>
            @endauth
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('signup') }}">Register</a>
            @else
                <span>Hola, {{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endguest
        </nav>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>
</html>
