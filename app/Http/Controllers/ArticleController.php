<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Subscription;


class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }
    public function create(Request $request, $category)
    {
        Article::create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'author_id' => auth()->id(),
                'category_id' => $category
            ]
        );
        foreach (Subscription::all() as $subscription) {
            dispatch( new SendEmail($request->title, $subscription->email) );
        }

        return response()->json(['message' => "your article successfully addeds"], 201);
    }
    public function edit(Request $request, $category, Article $article)
    {
        if ($article->author_id == auth()->id()) {
            $article->update(
                [
                    'title' => $request->title,
                    'content' => $request->content
                ]
            );

            return response()->json(['message' => "your article  edited"], 200);
        }
        return response()->json(['message' => "you can not update your article"], 403);

    }
    public function destroy($category, Article $article)
    {
        if ($article->author_id == auth()->id()) {
            $article->delete();
            return response()->json(['message' => "your article deleted"], 200);
        }
        return response()->json(['message' => "you can not delete your article"], 403);
    }
}