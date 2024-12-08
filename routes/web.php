<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [MovieController::class, 'welcome'])->name('welcome');
Route::get('/list-filmu', [MovieController::class, 'listFilmu'])->name('listFilmu'); // Zde oprava

