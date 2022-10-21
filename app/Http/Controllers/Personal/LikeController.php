<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts()->paginate(10);
        return view('personal.likes.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        auth()->user()->posts()->detach($post);
        return redirect()->route('personal.like.index');
    }
}
