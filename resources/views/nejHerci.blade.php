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

    <header class="header fixed top-0 w-full bg-white shadow-lg z-50">
        <div class="search-container">

            <div x-data="{ query: '', results: [], showDropdown: false }" class="relative search-container">
                <!-- Vyhledávací input -->
                <div class="flex items-center">
                    <input
                        type="text"
                        placeholder="Vyhledávání"
                        class="search-input border p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-600"
                        x-model="query"
                        @input.debounce.300ms="
                fetch(`/autocomplete?query=${query}`)
                .then(res => res.json())
                .then(data => {
                    results = [...data.movies, ...data.actors];
                    showDropdown = data.movies.length > 0 || data.actors.length > 0 || query.length > 0;
                });
            "
                        @click.away="showDropdown = false">
                </div>

                <!-- Dropdown s výsledky -->
                <div x-show="showDropdown" class="absolute top-full mt-1 w-full bg-white border rounded-lg shadow-lg z-50">
                    <template x-if="results.length > 0">
                        <ul>
                            <template x-for="item in results" :key="item.id">
                                <li class="p-2 hover:bg-gray-100 flex items-center space-x-2">
                                    <img :src="`/${item.image}`" alt="Náhled" class="w-8 h-8 object-cover rounded-full">
                                    <a :href="`/movies/${item.id}`" x-text="item.name" class="block text-gray-700"></a>
                                </li>
                            </template>
                        </ul>
                    </template>
                    <template x-if="results.length === 0 && query.length > 0">
                        <p class="p-2 text-gray-500 text-center">Nic jsme nenašli.</p>
                    </template>
                </div>
            </div>
        </div>

        <!-- Ikony -->
        <div class="icons">
            <a href="{{ route('addFilm.create') }}" class="material-symbols-outlined">add_circle</a>
            <a href="{{ route('welcome') }}" class="material-symbols-outlined">home</a>
            <a href="{{ route('listFilmu') }}" class="material-symbols-outlined">list</a>
            <a href="{{ route('nejHerci') }}" class="material-symbols-outlined">recent_actors</a>
        </div>

        <!-- Odkazy pro přihlášení/odhlášení -->
        <div class="auth-links">
            @guest
            <a href="{{ route('login') }}" class="login-link">Přihlásit</a>
            <a href="{{ route('register') }}" class="register-link">Registrovat</a>
            @endguest

            @auth
            <div class="relative inline-block text-left" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button type="button" class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
                    {{ Auth::user()->name }}
                    <span class="material-symbols-outlined ml-1">expand_more</span>
                </button>
                <<div class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-50" x-show="open" x-transition>
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Odhlásit</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </header>



    <body>
        <div class="actors-container">
            <h1 class="BestActors">Nejlepší herci</h1>
            @foreach ($actors as $actor)
            <div class="actor-item">
                <img src="{{ asset($actor->image) }}" alt="{{ $actor->name }}" class="actor-image">
                <div class="actor-info">
                    <p class="actor-name">{{ $actor->name }}</p>
                    <p class="actor-details">
                        Věk: {{ $actor->age }} | Hodnocení: {{ $actor->rating }}/10
                    </p>
                    <p class="actor-bio">{{ $actor->bio }}</p>
                </div>

            </div>
            @endforeach
        </div>
    </body>