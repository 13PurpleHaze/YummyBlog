<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Social;
use Carbon\Carbon;

class PostController
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(6);
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $mostPopularPost = $popularPosts[0];
        $socials = Social::all();
        return view('post.index', compact('categories', 'posts', 'popularPosts', 'mostPopularPost', 'socials'));
    }

    public function show(Post $post)
    {
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(6)
            ->get();
        $socials = Social::all();
        return view('post.show', compact('post', 'popularPosts', 'relatedPosts', 'socials'));
    }
}
