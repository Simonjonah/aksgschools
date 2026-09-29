<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LgaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
            'data' => $this->collection->transform(function ($viewLgas) {
                return [
                    
                    'lga' => $viewLgas->lga,
                    'ref_no' => $viewLgas->ref_no,
                    'created_at' => $viewLgas->created_at->toDateTimeString(),
                ];
            }),
            'total' => $this->collection->count(),
        ];
    }
}
