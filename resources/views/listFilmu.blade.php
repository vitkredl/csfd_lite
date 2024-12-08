<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nejlepší filmy</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<header class="header">
    <!-- Odkazy pro přihlášení a registraci -->
    <div class="auth-links">
        <a href="#" class="login-link">Přihlásit</a>
        <a href="#" class="register-link">Registrovat</a>
    </div>

    <!-- Ikony zarovnané na střed -->
    <div class="icons">
        <a href="{{ route('welcome') }}" class="material-symbols-outlined">home</span>
        <a href="{{ route('listFilmu') }}" class="material-symbols-outlined">list</a>
        <span class="material-symbols-outlined">recent_actors</span>
       
    </div>

    <!-- Vyhledávání pod ikonami -->
    <div class="search-container">
        <span class="material-symbols-outlined search-icon">search</span>
        <input type="text" placeholder="Vyhledávání" class="search-input">
    </div>
</header>

<body>
    <div class="movies-container">
        <h1>Nejlepší filmy</h1>
        @foreach ($movies as $movie)
        <div class="movie-item">
            <img src="{{ $movie['image'] }}" alt="Poster filmu">
            <div class="movie-info">
                <p class="movie-title">{{ $movie['title'] }}</p>
                <p class="movie-details">
                    Rok: {{ $movie['year'] }} | Čas: {{ $movie['duration'] }} min | Věk: {{ $movie['age'] }}+ | Hodnocení: {{ $movie['rating'] }}/10
                </p>
            </div>
            <div class="movie-actions">
            <a href="" class="material-symbols-outlined">info</a>
            </div>
        </div>
        @endforeach
    </div>
</body>