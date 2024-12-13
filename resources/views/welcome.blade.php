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

    <main class="main-content">
        <!-- Sekce videí -->
        <section class="videos-section">
            <div class="video-block">
                <div class="section-title">Nové filmy</div>
                <div class="video-wrapper">
                    <video src="movie.mp4" controls class="video-player"></video>
                    <div class="video-info">
                        <p>Jméno filmu <span class="year">2024</span></p>
                        <span class="source">Zdroj</span>
                    </div>
                </div>
            </div>
            <div class="video-block">
                <div class="section-title">Nové seriály</div>
                <div class="video-wrapper">
                    <video src="series.mp4" controls class="video-player"></video>
                    <div class="video-info">
                        <p>Jméno seriálu <span class="year">2024</span></p>
                        <span class="source">Zdroj</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tipy na filmy -->
        <section class="tips-section">
    <h2 class="text-xl font-bold mb-4">Tipy na filmy</h2>
    @foreach ($movies as $movie)
    <div class="movie-item">
        <img src="{{ asset($movie->image) }}" alt="{{ $movie->name }}">
        <div class="movie-details">
            <h3>{{ $movie->name }}</h3>
            <p>Herec: {{ $movie->actor }}</p>
            <p>Rok: {{ $movie->year }}</p>
        </div>
        <a href="{{ route('movies.show', $movie->id) }}" class="material-symbols-outlined info-link">info</a>
    </div>
    @endforeach
</section>




    </main>

    <footer>
        <p>&copy; 2024 Filmový Portál</p>
    </footer>
</body>
</html>
