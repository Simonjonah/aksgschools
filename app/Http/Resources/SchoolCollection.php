<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SchoolCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'data' => $this->collection->transform(function ($viewSchoolsInSingleLgas) {
                return [
                    
                    'schoolname' => $viewSchoolsInSingleLgas->schoolname,
                    'address' => $viewSchoolsInSingleLgas->address,
                    'motor' => $viewSchoolsInSingleLgas->motor,
                    'address' => $viewSchoolsInSingleLgas->address,
                    'connect' => $viewSchoolsInSingleLgas->connect,
                    'schooltype' => $viewSchoolsInSingleLgas->schooltype,
                    'section' => $viewSchoolsInSingleLgas->section,
                    'centernumber' => $viewSchoolsInSingleLgas->centernumber,
                    'schooltype' => $viewSchoolsInSingleLgas->schooltype,
                    'logo' => collect($viewSchoolsInSingleLgas->logo)->map(function ($image) {
                    return asset($image);
                })->values(),
                    'created_at' => $viewSchoolsInSingleLgas->created_at->toDateTimeString(),
                ];
            }),
            'total' => $this->collection->count(),
        ];
    }
}