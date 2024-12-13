<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'name' => 'Nightfall',
                'year' => 2023,
                'genre' => 'Sci-Fi',
                'actor' => 'Chris Pratt',
                'image' => 'images/nightfall.jpg',
                'popisFilmu' => 'A thrilling sci-fi adventure about survival in the darkness of space.',
            ],
            [
                'name' => 'Golden Horizon',
                'year' => 2022,
                'genre' => 'Drama',
                'actor' => 'Scarlett Johansson',
                'image' => 'images/golden_horizon.jpg',
                'popisFilmu' => 'A heartwarming story of love, loss, and new beginnings under a golden sky.',
            ],
            [
                'name' => 'Mystic Falls',
                'year' => 2021,
                'genre' => 'Fantasy',
                'actor' => 'Tom Hiddleston',
                'image' => 'images/mystic_falls.jpg',
                'popisFilmu' => 'A magical journey to a world hidden beyond the falls.',
            ],
            [
                'name' => 'Echoes of Eternity',
                'year' => 2024,
                'genre' => 'Romance',
                'actor' => 'Emma Watson',
                'image' => 'images/echoes_eternity.jpg',
                'popisFilmu' => 'A timeless love story that transcends the barriers of time.',
            ],
            [
                'name' => 'Shadows of the Past',
                'year' => 2020,
                'genre' => 'Thriller',
                'actor' => 'Leonardo DiCaprio',
                'image' => 'images/shadows_past.jpg',
                'popisFilmu' => 'A gripping thriller unraveling the secrets buried in the past.',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::firstOrCreate(
                ['name' => $movie['name']], // Podmínka: pokud film se stejným názvem existuje, nepřidávat nový
                $movie                       // Data k uložení
            );
        }
    }
}
