<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AcademicsessionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
            'data' => $this->collection->transform(function ($view_sessions) {
                return [
                    
                    'academic_session' => $view_sessions->academic_session,
                    'created_at' => $view_sessions->created_at->toDateTimeString(),
                ];
            }),
            'total' => $this->collection->count(),
        ];
    }
}

