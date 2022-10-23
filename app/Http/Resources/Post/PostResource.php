<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'preview_image' => $this->preview_image,
            'main_image' => $this->main_image,
            'created_at' => $this->dateAsCarbon->format('F d, Y'),
            'category_title' => $this->category->title,
        ];
    }
}
