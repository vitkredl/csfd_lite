<?php

namespace App\Http\Controllers;
use App\Models\Actor;
use Illuminate\Http\Request;


class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::orderBy('rating', 'desc')->get();
        return view('nejHerci', compact('actors'));
    }

}

