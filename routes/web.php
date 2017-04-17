<?php

use App\Article;
use Illuminate\Http\Request;

Route::get('/', function ( Request $request) {
    $article = Article::find('1');

    dd($article->comments()->get());
});
