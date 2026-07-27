<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // On vérifie si l'utilisateur est connecté ET s'il est admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Sinon, on le renvoie à l'accueil avec un petit message
        return redirect('/')->with('error', 'Accès réservé aux administrateurs.');
    }
}