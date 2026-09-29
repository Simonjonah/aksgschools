<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Result extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subjectname',
        'user_id',
        'school_id',
        'fname',
        'surname',
        'middlename',
        'test_1',
        'test_2',
        'exams',
        'classname',
        'section',
        'subsection',
        'dob',
        'ref_no',
        'alms',
        'fname',
        'teacher_id',
        'student_id',
        'term',
        'academic_session',
        'classname',
        'logo',
        'regnumber',
        'lga',
        'schooltype',
        'signature',
        'gender',
        'images',
        'tfname',
        'tfname',
        'dob',
        'ref_no2',
        'tfname',
        'tlname',
        'teacher_id',
        'slug',

    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function studentdomains(): HasMany
    {
        return $this->hasMany(Studentdomain::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

}