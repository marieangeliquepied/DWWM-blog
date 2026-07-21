@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">

    {{-- Titre principal --}}
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Liste des catégories</h1>

    {{-- En-tête avec bouton --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-slate-700">Catégories</h2>
        <a href="{{ route('admin.categories.create') }}" 
           class="bg-black text-white font-bold text-xs px-4 py-2.5 tracking-wider hover:bg-gray-800 transition rounded-sm">
            + NOUVELLE CATÉGORIE
        </a>
    </div>

    {{-- Message de succès (Vert) --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Message d'erreur (Rouge) --}}
    @if(session('error'))
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-sm">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tableau des catégories -->
    <div class="border border-gray-400 bg-white">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-400 text-sm text-gray-600 bg-gray-50">
                    <th class="p-3 font-normal">Nom</th>
                    <th class="p-3 font-normal">Articles</th>
                    <th class="p-3 font-normal">Date de création</th>
                    <th class="p-3 font-normal text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-200">
                @foreach($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <!-- Nom de la catégorie -->
                        <td class="p-3 text-black font-medium">{{ $category->name }}</td>
                        
                        <!-- Nombre d'articles -->
                        <td class="p-3 text-gray-600">
                            {{ $category->articles_count ?? $category->articles->count() }}
                        </td>
                        
                        <!-- Date de création -->
                        <td class="p-3 text-gray-600">
                            {{ $category->created_at ? $category->created_at->format('d/m/Y') : '-' }}
                        </td>
                        
                        <!-- Actions -->
                        <td class="py-3.5 px-4 text-right">
                            <div class="flex items-center justify-end gap-3 text-slate-600">
                                
                                {{-- Bouton Modifier (Crayon SVG) --}}
                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                class="hover:text-black transition" 
                                title="Modifier">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>

                                {{-- Bouton Supprimer (Poubelle SVG) --}}
                                <form action="{{ route('admin.categories.destroy', $category) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Confirmer la suppression ?');" 
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-red-600 transition" title="Supprimer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>lucide.createIcons();</script>
@endsection