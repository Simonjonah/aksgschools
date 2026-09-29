<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($viewnews) {
                return [
                    
                    'title' => $viewnews->title,
                    'messages' => $viewnews->messages,
                    'slug' => $viewnews->slug,
                    'images' => collect($viewnews->images)->map(function ($image) {
                    return asset($image);
                })->values(),
                    'created_at' => $viewnews->created_at->toDateTimeString(),
                ];
            }),
            'total' => $this->collection->count(),
        ];
    }
}

