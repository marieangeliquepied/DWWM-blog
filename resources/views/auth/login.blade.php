@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex flex-col justify-center items-center px-4">
    <h1 class="text-3xl font-bold mb-8 text-center">Se connecter</h1>

    <form action="/login" method="POST" class="w-full max-w-sm space-y-4">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="janesepa@email.com" required
                class="w-full border border-gray-400 p-2 focus:outline-none focus:border-black">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Mot de passe --}}
        <div>
            <label for="password" class="block text-sm font-medium mb-1">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="******" required
                class="w-full border border-gray-400 p-2 focus:outline-none focus:border-black">
        </div>

        {{-- Bouton Soumission --}}
        <div class="pt-2 flex justify-center">
            <button type="submit" class="bg-black text-white px-8 py-2.5 font-medium hover:bg-gray-800 transition">
                Se connecter
            </button>
        </div>
    </form>

    <p class="text-sm text-gray-600 mt-6 text-center">
        Pas encore de compte ? <br>
        <a href="{{ route('register') }}" class="underline hover:text-black">→ S'inscrire</a>
    </p>
</div>
@endsection
