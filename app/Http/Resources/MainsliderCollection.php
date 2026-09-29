<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MainsliderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
   public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($viewSliders) {
                return [
                    
                    'title' => $viewSliders->title,
                    'facts' => $viewSliders->facts,
                    'ref_no' => $viewSliders->ref_no,
                    'images' => collect($viewSliders->images)->map(function ($image) {
                    return asset($image);
                })->values(),
                    'created_at' => $viewSliders->created_at->toDateTimeString(),
                ];
            }),
            'total' => $this->collection->count(),
        ];
    }
}
