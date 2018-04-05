<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $comments = $article->comments()->latest()->paginate(5);

        return view('article.show', compact('article', 'comments'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required|min:10'
        ]);

        $request->user()->articles()->create($data);

        return redirect('home')->with('success', 'Article Published');
    }
}
