<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Article;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }
    public function create(Request $request)
    {
        Tag::create(['name' => $request->name]);
        return response()->json(['message' => 'your tag has been created'], 201);
    }

    public function getArticleTags(Category $category, Article $article)
    {
        $tags = $article->tags()->pluck('tag_id');
        return response()->json(['tags' => $tags], 200);
    }
    public function updateArticleTags(Request $request, Category $category, Article $article)
    {
        $article->tags()->sync($request->tags);
        return response()->json(['message' => 'your article tags has been updated'], 200);
    }
}