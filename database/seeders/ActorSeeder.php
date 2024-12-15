<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    public function run()
    {
        // Původní herci
        Actor::create([
            'name' => 'Leonardo DiCaprio',
            'age' => 48,
            'rating' => 9.5,
            'image' => 'images/dicaprio.jpg',
            'bio' => 'Famous actor known for Titanic and Inception.',
        ]);

        Actor::create([
            'name' => 'Emma Watson',
            'age' => 33,
            'rating' => 9.0,
            'image' => 'images/emma_watson.jpg',
            'bio' => 'Best known for her role in Harry Potter.',
        ]);

        // Noví herci
        Actor::create([
            'name' => 'Robert Downey Jr.',
            'age' => 59,
            'rating' => 9.7,
            'image' => 'images/robert_downey.jpg',
            'bio' => 'Known for his iconic role as Iron Man in the Marvel Cinematic Universe.',
        ]);

        Actor::create([
            'name' => 'Scarlett Johansson',
            'age' => 39,
            'rating' => 9.3,
            'image' => 'images/scarlett_johansson.jpg',
            'bio' => 'Famous for her performances in Black Widow and Lost in Translation.',
        ]);

        Actor::create([
            'name' => 'Tom Hanks',
            'age' => 67,
            'rating' => 9.6,
            'image' => 'images/tom_hanks.jpg',
            'bio' => 'Legendary actor known for roles in Forrest Gump and Cast Away.',
        ]);
    }
}
