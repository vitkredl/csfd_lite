<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

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
    <main class="main-content">
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
    <aside class="tips-section">
        <div class="section-title">Tipy na film</div>
        <div class="tip-card">
            <img src="movie-poster.jpg" alt="Film" class="tip-image">
            <div class="tip-info">
                <p>Jméno filmu, rok, věk</p>
                <a href="" class="material-symbols-outlined">info</a>
            </div>
        </div>
        <div class="tip-card">
            <img src="movie-poster.jpg" alt="Film" class="tip-image">
            <div class="tip-info">
                <p>Jméno filmu, rok, věk</p>
                <a href="" class="material-symbols-outlined">info</a>
            </div>
        </div>
    </aside>

    </main>

    <footer>
        <p>&copy; 2024 Filmový Portál</p>
    </footer>
</body>

</html>
