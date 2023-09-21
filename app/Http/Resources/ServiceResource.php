<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'content' => $this->content,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'image' => url('/storage/' . $this->image),
            'slug' => $this->slug
        ];
    }
}
