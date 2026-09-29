<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AlmCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'data' => $this->collection->transform(function ($view_alms) {
                return [
                    
                    'alms' => $view_alms->alms,
                    'created_at' => $view_alms->created_at->toDateTimeString(),
                ];
            }),
            'total' => $this->collection->count(),
        ];
    }
}
