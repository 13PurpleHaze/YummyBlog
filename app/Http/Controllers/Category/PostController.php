<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        return  view('categories.post.index', compact('category', 'posts'));
    }

}
