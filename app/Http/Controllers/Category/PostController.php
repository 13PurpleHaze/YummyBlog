<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Social;

class PostController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        $socials = Social::all();
        return  view('categories.post.index', compact('category', 'posts', 'socials'));
    }

}
