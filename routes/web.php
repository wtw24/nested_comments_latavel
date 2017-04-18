<?php

use App\Article;
use Illuminate\Http\Request;

Route::get('/', function ( Request $request) {
    $article = Article::find('1');

    $comments = $article->nestedComments(1, 20);

    return view('comments.index', compact('article', 'comments'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
