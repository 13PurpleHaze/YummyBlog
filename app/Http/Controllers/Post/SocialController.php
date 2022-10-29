<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Social\SocialResource;
use App\Models\Social;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return SocialResource::collection($socials);
    }
}
