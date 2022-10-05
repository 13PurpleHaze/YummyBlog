<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(6);
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return view('main.index', compact('categories', 'posts', 'popularPosts'));
    }
}
