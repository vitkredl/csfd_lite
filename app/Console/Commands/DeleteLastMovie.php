<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;

class DeleteLastMovie extends Command
{
    protected $signature = 'movie:delete-last';
    protected $description = 'Smaže poslední přidaný film';

    public function handle()
    {
        $lastMovie = Movie::latest()->first();

        if ($lastMovie) {
            $lastMovie->delete();
            $this->info("Poslední přidaný film byl úspěšně smazán: {$lastMovie->name}");
        } else {
            $this->info("Žádný film ke smazání nenalezen.");
        }
    }
}
