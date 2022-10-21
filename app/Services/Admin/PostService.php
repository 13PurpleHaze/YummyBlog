<?php

namespace App\Services\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);

            if(isset($data['tag_ids'])) {
                $tag_ids = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $post = Post::firstOrCreate($data);
            if(isset($tag_ids)) {
                $post->tags()->attach($tag_ids);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, Post $post)
    {
        try {
            DB::beginTransaction();

            if(isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
            }
            if(isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            }

            $tag_ids = $data['tag_ids'];
            unset($data['tag_ids']);
            $post->update($data);
            $post->tags()->sync($tag_ids);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return route('404');
        }

    }
}
