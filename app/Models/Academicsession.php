<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Academicsession extends Authenticatable
{
    use HasFactory;


    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'academic_session'
            ]
        ];
    }




}
