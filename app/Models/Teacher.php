<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Result;
use App\Models\School;
use App\Models\Teacherdomain;

class Teacher extends Authenticatable
{
   
    use HasApiTokens, HasFactory, Notifiable;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teacherdomains(): HasMany 
    {
        return $this->hasMany(Teacherdomain::class);
    }

    public function results(): HasMany 
    {
        return $this->hasMany(Result::class);
    }

    public function teacherassigns(): HasMany 
    {
        return $this->hasMany(Teacherassign::class);
    }


    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
