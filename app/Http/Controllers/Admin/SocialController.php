<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Social\StoreRequest;
use App\Http\Requests\Admin\Social\UpdateRequest;
use App\Models\Social;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return view('admin.socials.index', compact('socials'));
    }

    public function create()
    {
        return view('admin.socials.create');
    }

    public function store(StoreRequest $request, Social $social)
    {
        $data = $request->validated();
        $social->updateOrCreate(['title' => $data['title']], $data);
        return redirect()->route('admin.social.index');
    }

    public function edit(Social $social)
    {
        return view('admin.socials.edit', compact('social'));
    }

    public function update(UpdateRequest $request, Social $social)
    {
        $data = $request->validated();
        $social->update($data);
        return redirect()->route('admin.social.index');
    }

    public function destroy(Social $social)
    {
        $social->delete();
        return redirect()->route('admin.social.index');
    }
}
