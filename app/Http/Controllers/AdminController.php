<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $articles = Article::with(['category'])
        ->latest('created_at')
        ->paginate(5);

        return view('admin-articles', compact('articles'));
    }
}