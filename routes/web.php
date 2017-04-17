<?php

use App\Article;
use Illuminate\Http\Request;

Route::get('/', function ( Request $request) {
    $article = Article::find('1');

    return response('abc');

    dd($article->comments());
});
