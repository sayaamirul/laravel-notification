<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('article')->group(function() {
    Route::get('create', 'ArticleController@create')->name('article.create');
    Route::post('create', 'ArticleController@store')->name('article.store');
    Route::get('/{article}', 'ArticleController@show')->name('article.show');
    Route::post('/{article}/comment', 'CommentController@store')->name('comment.store');
});