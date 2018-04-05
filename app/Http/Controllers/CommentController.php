<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $data = $request->validate([
            'body' => 'required'
        ]);

       $article->comments()->create(array_merge($data, ['user_id' => $request->user()->id]));

        return redirect()->back()->with('success','Comment added');
    }
}
