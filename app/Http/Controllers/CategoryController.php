<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Article;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        Category::create(['name' => $request->name]);
    }
    public function destroy(Category $category)
    {
        if (!$category->articles()->count()) {
            $category->delete();
            return response()->json(['message' => "your category deleted"], 200);
        }
        return response()->json(['message' => "THe category has Articles"], 403);
    }
}