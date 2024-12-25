<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Actor;

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
    $movie = Movie::findOrFail($id);
    return view('movie-detail', compact('movie'));
}

public function search(Request $request)
{
    $query = $request->input('query');

    // Vyhledávání ve filmech
    $movies = Movie::where('name', 'like', "%{$query}%")->get();

    // Vyhledávání v hercích
    $actors = Actor::where('name', 'like', "%{$query}%")->with('movies')->get();

    return response()->json([
        'movies' => $movies,
        'actors' => $actors
    ]);
}



public function autocomplete(Request $request)
{
    $query = $request->input('query');

    if ($query) {
        $movies = Movie::where('name', 'like', "%{$query}%")->select('id', 'name', 'image')->get();
        $actors = Actor::where('name', 'like', "%{$query}%")
            ->with(['movies' => function ($query) {
                $query->select('id', 'name', 'image', 'actor');
            }])
            ->select('id', 'name', 'image')
            ->get();

        // Filtruj herce, kteří nemají žádný film
        $actors = $actors->filter(function ($actor) {
            return $actor->movies->isNotEmpty();
        });

        return response()->json([
            'movies' => $movies,
            'actors' => $actors
        ]);
    }

    return response()->json(['movies' => [], 'actors' => []]);
}


}