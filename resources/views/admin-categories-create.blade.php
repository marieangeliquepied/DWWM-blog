@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">

    {{-- En-tête avec bouton retour --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Créer une catégorie</h1>
        <a href="{{ route('admin.categories.index') }}" class="text-slate-600 hover:text-black text-sm flex items-center gap-1">
            ← Retour à la liste
        </a>
    </div>

    {{-- Carte du Formulaire --}}
    <div class="bg-white border border-slate-300 rounded-sm p-6">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            {{-- Champ Nom --}}
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                    Nom de la catégorie
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name') }}"
                       placeholder="Ex: Intelligence Artificielle"
                       class="w-full border border-slate-300 rounded-sm p-2.5 text-sm focus:outline-none focus:border-black"
                       required>
                
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Bouton de soumission --}}
            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-black text-white text-xs font-bold px-5 py-2.5 tracking-wider hover:bg-gray-800 transition rounded-sm">
                    ENREGISTRER
                </button>
            </div>
        </form>
    </div>

</div>
@endsection