<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Movie;


class MovieController extends Controller
{
    public function welcome()
    {
        $movies = Movie::inRandomOrder()->limit(5)->get(); // Načtení 5 náhodných filmů
    return view('welcome', compact('movies'));
    }

    public function listFilmu()
    
        {
            $movies = Movie::paginate(5); // Zobrazení 5 filmů na stránku
            return view('listFilmu', compact('movies'));
        }
    

    public function create()
    {
        // Zobrazení formuláře pro přidání filmu
        return view('pridejFilm');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'year' => 'required|integer',
        'genre' => 'required|string|max:255',
        'actors' => 'nullable|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'popisFilmu' => 'nullable|string|max:1000', // Validace popisu
    ]);

    $file = $request->file('image');
    $imageName = time() . '.' . $file->getClientOriginalExtension();
    $imagePath = 'images/' . $imageName;

    $file->move(public_path('images'), $imageName);

    // Kontrola, zda film již existuje
    if (Movie::where('name', $validated['name'])->exists()) {
        return redirect()->back()->with('error', 'Film již existuje!');
    }

    // Uložení záznamu do databáze
    Movie::create([
        'name' => $validated['name'],
        'year' => $validated['year'],
        'genre' => $validated['genre'],
        'actor' => $validated['actors'],
        'image' => $imagePath,
        'popisFilmu' => $validated['popisFilmu'], // Uložení popisu
    ]);

    return redirect()->route('listFilmu')->with('success', 'Film byl úspěšně přidán!');
}

public function show($id)
{
    $movie = Movie::findOrFail($id); // Načtení filmu podle ID
    return view('movie-detail', compact('movie')); // Přesměrování na nový blade
}

}