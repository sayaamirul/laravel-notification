<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Observers\ArticleObserver;
use App\Article;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);
        Article::observe(ArticleObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
