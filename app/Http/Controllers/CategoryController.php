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

    public function adminIndex(): View {
    // On récupère les catégories avec le nombre d'articles associés
    $categories = Category::withCount('articles')->get();

    return view('admin-categories-list', ['categories' => $categories]);
    }
}
