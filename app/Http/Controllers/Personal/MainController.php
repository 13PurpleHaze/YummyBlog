<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\PostUserLike;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $likesCount = count(auth()->user()->posts);
        $commentsCount = count(auth()->user()->comments);
        return view('personal.main', compact('likesCount', 'commentsCount'));
    }
}
