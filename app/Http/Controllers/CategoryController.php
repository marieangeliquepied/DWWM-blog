<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
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
}
