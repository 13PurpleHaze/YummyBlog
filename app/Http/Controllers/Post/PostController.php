<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class PostController
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(6);
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return view('post.index', compact('categories', 'posts', 'popularPosts'));
    }

    public function show(Post $post)
    {
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(6)
            ->get();
        return view('post.show', compact('post', 'popularPosts', 'relatedPosts'));
    }
}
