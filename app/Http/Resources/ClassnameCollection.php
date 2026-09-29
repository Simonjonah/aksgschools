<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassnameCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($view_classnames) {
                return [
                    
                    'classname' => $view_classnames->classname,
                    'created_at' => $view_classnames->created_at->toDateTimeString(),
                ];
            }),
            'total' => $this->collection->count(),
        ];
    }
}
