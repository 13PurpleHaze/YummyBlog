<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->paginate(10);
        $socials = Social::all();
        return  view('tags.post.index', compact('tag', 'posts', 'socials'));
    }

}
