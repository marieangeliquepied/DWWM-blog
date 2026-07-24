<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Valide et traite la tentative de connexion.
     */
    public function store(Request $request)
    {
        // 1. Validation des champs
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Tentative d'authentification
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 3. Redirection sécurisée avec intended()
            return redirect()->intended('/')->with('success', 'Ravi de vous revoir !');
        }

        // 4. Gestion de l'erreur d'identifiants
        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request) {
        // 1. Déconnexion de l'utilisateur
        Auth::logout();

        // 2. Invalidation de la session et régénération du token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 3. Redirection vers l'accueil
        return redirect('/')->with('success', 'Déconnexion réussie, à très vite !');
    }
}