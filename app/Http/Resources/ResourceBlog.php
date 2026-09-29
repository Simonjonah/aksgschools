<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourceBlog extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'slug' => $this->slug,
              'title' => $this->title,
              'ref_no' => $this->ref_no,
              'images' => collect($this->images)->map(function ($image) {
                    return asset($image);
                })->values(),
              'messages' => $this->messages,
             
              'created_at' => $this->created_at->toDateTimeString(), 
          ];
    }
}
