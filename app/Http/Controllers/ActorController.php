<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function nejHerci()
    {
        $actors = [
            [
                'image' => 'images/movie1.jpg',
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

        return view('nejHerci', compact('actors'));
    }
}