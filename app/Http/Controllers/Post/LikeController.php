<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostUserLike;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        auth()->user()->posts()->toggle($post);
        return [];
    }
}
