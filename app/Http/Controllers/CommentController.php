<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Notifications\ArticleCommentNotification;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $data = $request->validate([
            'body' => 'required'
        ]);

       $comment = $article->comments()->create(array_merge($data, ['user_id' => $request->user()->id]));

        $comment->load('article','user');
        $user = $article->user;

        $user->notify(new ArticleCommentNotification($comment));

        return redirect()->back()->with('success','Comment added');
    }
}
