<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryImage;
use Illuminate\Http\Request;

class CategoryImagesController extends Controller
{
    public function store(Request $request) {
        $imagePath = $request->image->store('public/category_images');
        $position = CategoryImage::all()->count() + 1;
        $categoryImage = CategoryImage::create([
            'image' => str_replace('public/category_images/', '', $imagePath),
            'order' => $position,
            'name'  => $request->image->getClientOriginalName(),
            'category_id' => intval($request->input('category_id'))
        ]);

        $category = Category::with(['images'])->where('id', $request->input('category_id'))->first();
        return response()->json($category, 200);
    }
}
