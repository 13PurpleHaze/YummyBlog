<?php

namespace App\Http\Controllers;

use App\Services\Admin\PostService;

class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}
