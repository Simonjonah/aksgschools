<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Studentdomain extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'regnumber',
        'user_id',
        'teacher_id',
        'psycomoto',
        'cogname',
        'punt1',
        'student_id',
        'schooltype',
        'type',
        'punt5',
        'schooltype',
        'alms',
        'regnumber',
        'classname',
        'academic_session',
        'section',
        'ref_no1',
        'punt3',
        'punt5',
        'punt4',
        'term',
        'punt2',
        'connect',
        'teacher_comment',
        'nextterm',
        'nextermschoolfees',
        'conduct',
        'attendant',
        'outoff',
        'ref_no',
    ];

    public function result(): BelongsTo
    {
        return $this->belongsTo(Result::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
 

}
