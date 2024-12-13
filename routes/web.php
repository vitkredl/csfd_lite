<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Domovská stránka (welcome)
Route::get('/', [MovieController::class, 'welcome'])->name('welcome');

// Autentizační routy
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Filmy
Route::get('/list-filmu', [MovieController::class, 'listFilmu'])->name('listFilmu');
Route::get('/add-film', [MovieController::class, 'create'])->middleware('auth')->name('addFilm.create');
Route::post('/add-film', [MovieController::class, 'store'])->middleware('auth')->name('addFilm.store');

// Nejlepší herci
Route::get('/nej-herci', [ActorController::class, 'nejHerci'])->name('nejHerci');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

