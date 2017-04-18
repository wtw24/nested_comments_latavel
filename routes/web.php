<?php

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

Route::get('/', function ( Request $request) {
	$perPage = 10;
	$page = $request->get('page', 1);

    $article = Article::find('1');

    $comments = $article->nestedComments($page, $perPage);
    $comments = new LengthAwarePaginator(
    	$comments,
	    count($article->comments->where('parent_id', null)),
	    $perPage,
	    $page,
	    ['path' => $request->url(), 'query' => $request->query()]
    );

    return view('comments.index', compact('article', 'comments'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
