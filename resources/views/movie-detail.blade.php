<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Globální styly -->
</head>
<body>
    <!-- Detail filmu -->
    <div class="movie-detail">
        <!-- Obrázek -->
        <img src="{{ asset($movie->image) }}" alt="{{ $movie->name }}" class="movie-image">
        <!-- Blok informací a popisu -->
        <div class="movie-info-block">
            <h1>{{ $movie->name }}</h1>
            <p><span class="font-semibold">Rok:</span> {{ $movie->year }}</p>
            <p><span class="font-semibold">Žánr:</span> {{ $movie->genre }}</p>
            <p><span class="font-semibold">Herec:</span> {{ $movie->actor }}</p>
            <div class="movie-description">
                <p><span class="font-semibold">Popis:</span> {{ $movie->popisFilmu }}</p>
            </div>
        </div>
        <!-- Tlačítko Zpět -->
        <a href="{{ route('listFilmu') }}" class="movie-back-button">Zpět</a>
    </div>
</body>
</html>
