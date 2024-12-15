<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    public function run()
    {
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
    }
}
