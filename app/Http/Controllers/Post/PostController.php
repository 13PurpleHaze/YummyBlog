<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Social;
use Carbon\Carbon;

class PostController
{
    public function index()
    {
        //$categories = Category::all();
        $posts = Post::all();
        /*$popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        //$mostPopularPost = $popularPosts[0];*/
        //$socials = Social::all();
        return PostResource::collection($posts);
        return view('post.index', compact('categories', 'posts', 'popularPosts', 'mostPopularPost', 'socials'));
    }

    public function show(Post $post)
    {
        return new PostResource($post);
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(6)
            ->get();
        $socials = Social::all();
        return view('post.show', compact('post', 'popularPosts', 'relatedPosts', 'socials'));
    }
}
