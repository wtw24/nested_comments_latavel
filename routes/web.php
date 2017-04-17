<?php

use App\Article;
use Illuminate\Http\Request;

Route::get('/', function ( Request $request) {
    $article = Article::find('1');

    $comments = $article->comments()->with([
	    'user',
	    'replies.user',
	    'replies.parent.user',
    ])->get();

    return view('comments.index', compact('article', 'comments'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
