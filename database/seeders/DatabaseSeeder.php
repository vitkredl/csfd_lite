<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie; // Import modelu Movie
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seedování uživatelů
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Šifrované heslo
        ]);

        User::factory(10)->create(); // Vytvoření 10 testovacích uživatelů

        // Seedování filmů
        $this->call(MovieSeeder::class); // Zavolání MovieSeederu
    }
}
