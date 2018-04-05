<?php

namespace App\Http\Observers;

use App\Article;


class ArticleObserver
{
    public function creating(Article $article)
    {
        $article->slug = str_slug($article->title);
    }
}