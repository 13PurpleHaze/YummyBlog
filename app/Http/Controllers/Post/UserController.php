<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\UserResource;
use App\Http\Resources\Social\SocialResource;
use App\Models\Social;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return new UserResource($user);
    }
}
