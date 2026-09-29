<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolnew extends Model
{
    use HasFactory;

    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug1' => [
                'source' => 'title'
            ]
        ];
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
