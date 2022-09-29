<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data['postsCount'] = Post::all()->count();
        $data['usersCount'] = User::all()->count();
        $data['tagsCount'] = Tag::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        return view('admin.main', compact('data'));
    }
}
