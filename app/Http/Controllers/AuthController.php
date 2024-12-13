<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Pohled pro přihlášení
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        // Přesměrování na stránku welcome
        return redirect()->route('welcome'); // Zde používáme pojmenovanou routu welcome
    }

    return back()->withErrors([
        'email' => 'Přihlašovací údaje nejsou správné.',
    ]);

    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Pohled pro registraci
    }

    public function register(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    Auth::login($user);

    // Přesměrování na stránku welcome
    return redirect()->route('welcome');
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome'); 
    }
}

