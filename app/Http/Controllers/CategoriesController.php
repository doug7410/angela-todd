<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        return Category::with('images')->get();
    }

    public function store(Request $request) {
        Category::create($request->all());
        return response()->json(Category::with('images')->get(), 200);
    }
}
