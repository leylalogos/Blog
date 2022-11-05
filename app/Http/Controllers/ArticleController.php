<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(Request $request,$category)
    {
        Article::create(
            [
                'title' => $request->title,
                'content' => $request->content,
                //TODO: Add auth for author_id
                'author_id' => $request->author_id,
                'category_id' => $category
            ]
        );
        return response()->json(['f'=>"ggg"]);
    }
    public function edit()
    {
    }
    public function delete()
    {
    }
}