<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nejlepší filmy</title>
    <link rel="stylesheet" href="{{ asset('css/stylesList.css') }}">
</head>
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
                <i class="info-icon">ℹ️</i>
            </div>
        </div>
        @endforeach
    </div>
</body>