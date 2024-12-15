<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Globální styly -->
</head>
<body class="modern-movie-detail">
    <!-- Detail filmu -->
    <div class="movie-card">
        <!-- Obrázek vlevo -->
        <div class="movie-image-container">
            <img src="{{ asset($movie->image) }}" alt="{{ $movie->name }}" class="movie-image">
        </div>
        
        <!-- Textové informace vpravo -->
        <div class="movie-info-container">
            <h1 class="movie-title">{{ $movie->name }}</h1>
            <p class="movie-meta"><strong>Rok:</strong> {{ $movie->year }}</p>
            <p class="movie-meta"><strong>Žánr:</strong> {{ $movie->genre }}</p>
            <p class="movie-meta"><strong>Herec:</strong> {{ $movie->actor }}</p>
            <p class="movie-description">{{ $movie->popisFilmu }}</p>
            
            <!-- Tlačítko zpět -->
            <div class="back-button-container">
                <a href="{{ route('listFilmu') }}" class="back-button">Zpět</a>
            </div>
        </div>
    </div>
</body>
</html>
