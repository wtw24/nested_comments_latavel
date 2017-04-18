<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\NestableCommentsTrait;

class Article extends Model
{
	use NestableCommentsTrait;

    public function comments()
    {
    	return $this->morphMany(Comment::class, 'commentable');
    }
}
