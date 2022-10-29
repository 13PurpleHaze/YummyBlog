<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Social;

class PostController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts;
        return PostResource::collection($posts);
    }

}
