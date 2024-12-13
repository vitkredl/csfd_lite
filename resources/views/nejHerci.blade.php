<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind & Další styly -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <header class="header">
        <!-- Vyhledávací pole -->
        <div class="search-container">
            <input type="text" placeholder="Vyhledávání" class="search-input">
            <a href="{{ route('addFilm.create') }}" class="material-symbols-outlined outadd" id="iconAdd">add</a>
        </div>
        
        <!-- Ikony -->
        <div class="icons">
            <a href="{{ route('welcome') }}" class="material-symbols-outlined">home</a>
            <a href="{{ route('listFilmu') }}" class="material-symbols-outlined">list</a>
            <a href="{{ route('nejHerci') }}" class="material-symbols-outlined">recent_actors</a>
        </div>

        <!-- Auth Links -->
        <div class="auth-links">
            @guest
                <!-- Odkazy pro nepřihlášené -->
                <a href="{{ route('login') }}" class="login-link">Přihlásit</a>
                <a href="{{ route('register') }}" class="register-link">Registrovat</a>
            @endguest

            @auth
                <!-- Dropdown pro přihlášené -->
                <div class="relative inline-block text-left" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
    <!-- Tlačítko pro zobrazení uživatelského menu -->
    <button
        type="button"
        class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-gray-100 focus:outline-none">
        {{ Auth::user()->name }}
        <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown nabídka -->
    <div
        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-20"
        x-show="open"
        x-transition>
        <!-- Profil tlačítko -->
        <form action="{{ route('profile.show') }}" method="GET" class="block">
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Profil
            </button>
        </form>

        <!-- Logout tlačítko -->
        <form method="POST" action="{{ route('logout') }}" class="block">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Odhlásit
            </button>
        </form>
    </div>
</div>


            @endauth
        </div>
    </header>

<body>
    <div class="movies-container">
        <h1 class="BestFilms">Nejlepší herci</h1>
        @foreach ($actors as $actor)
        <div class="movie-item">
            <img src="{{ $actor['image'] }}" alt="Poster filmu">
            <div class="movie-info">
                <p class="movie-title">{{ $actor['title'] }}</p>
                <p class="movie-details">
                    Rok: {{ $actor['year'] }} | Čas: {{ $actor['duration'] }} min | Věk: {{ $actor['age'] }}+ | Hodnocení: {{ $actor['rating'] }}/10
                </p>
            </div>
            <div class="movie-actions">
            <a href="" class="material-symbols-outlined">info</a>
            </div>
        </div>
        @endforeach
    </div>
</body>