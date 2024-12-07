<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    //
}

class MovieController extends Controller
{
    public function index()
    {
        $movies = [
            [
                'image' => 'images/movie1.jpg', // Cesta k obrázku (uložte do public/images)
                'title' => 'Jméno filmu 1',
                'year' => 2023,
                'duration' => 120,
                'age' => 15,
                'rating' => 8.5,
            ],
            [
                'image' => 'images/movie2.jpg',
                'title' => 'Jméno filmu 2',
                'year' => 2022,
                'duration' => 95,
                'age' => 12,
                'rating' => 7.8,
            ],
        ];

        return view('movies', compact('movies'));
    }
}