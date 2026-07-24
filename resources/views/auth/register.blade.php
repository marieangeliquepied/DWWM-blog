@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex flex-col justify-center items-center px-4">
    <h1 class="text-3xl font-bold mb-2 text-center">Créer un nouveau compte</h1>

    <form action="/register" method="POST" class="w-full max-w-md space-y-4">
        @csrf

        {{-- Prénom & Nom sur la même ligne --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="firstname" class="block text-sm font-medium mb-1">Prénom</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required
                    class="w-full border border-gray-400 p-2 focus:outline-none focus:border-black">
                @error('firstname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="lastname" class="block text-sm font-medium mb-1">Nom</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required
                    class="w-full border border-gray-400 p-2 focus:outline-none focus:border-black">
                @error('lastname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="janesepa@email.com" required
                class="w-full border border-gray-400 p-2 focus:outline-none focus:border-black">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Mot de passe & Confirmation --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="password" class="block text-sm font-medium mb-1">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="******" required
                    class="w-full border border-gray-400 p-2 focus:outline-none focus:border-black">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="******" required
                    class="w-full border border-gray-400 p-2 focus:outline-none focus:border-black">
            </div>
        </div>

        <p class="text-sm text-gray-600 mb-8 text-center">
            Vous êtes déjà inscrit ? 
            <a href="{{ route('login') }}" class="underline hover:text-black">→ Se connecter</a>
        </p>

        {{-- Bouton Soumission --}}
        <div class="pt-4 flex justify-center">
            <button type="submit" class="bg-black text-white px-8 py-2.5 font-medium hover:bg-gray-800 transition">
                S'inscrire
            </button>
        </div>
    </form>
</div>
@endsection