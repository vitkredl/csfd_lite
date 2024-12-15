<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;


// Hlavní stránka
Route::get('/', [MovieController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Vyhledávání
Route::get('/search', [MovieController::class, 'search'])->name('search');

// Filmy
Route::get('/list-filmu', [MovieController::class, 'listFilmu'])->name('listFilmu');
Route::get('/add-film', [MovieController::class, 'create'])->middleware('auth')->name('addFilm.create');
Route::post('/add-film', [MovieController::class, 'store'])->middleware('auth')->name('addFilm.store');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

// Herci
Route::get('/nej-herci', [ActorController::class, 'index'])->name('nejHerci');

// Autentizace
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/autocomplete', [MovieController::class, 'autocomplete'])->name('autocomplete');
