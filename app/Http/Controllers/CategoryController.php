<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index() : View {
        $categories = Category::all();

        return view('admin-categories-list', ['categories' => $categories]);
    }

    public function getCategoryById(int $id) {
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    // On récupère les catégories avec le nombre d'articles associés
    public function adminIndex(): View {
        $categories = Category::withCount('articles')->get();

        return view('admin-categories-list', ['categories' => $categories]);
    }

    // Affiche la vue contenant le formulaire de création
    public function create(): View {
        return view('admin-categories-create');
    }

    public function store(Request $request): RedirectResponse {
        // 1. Validation des champs
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:categories,name',
        ], 
        [
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique' => 'Cette catégorie existe déjà.',
            'name.max' => 'Le nom ne doit pas dépasser 50 caractères.',
        ]);

        // 2. Création en BDD (avec création automatique du slug)
        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        // 3. Redirection vers la liste avec un message de succès
        return redirect()->route('admin.categories.index')
                        ->with('success', 'La catégorie a été créée avec succès !');
    }
}
