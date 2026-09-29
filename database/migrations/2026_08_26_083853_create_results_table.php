<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('school_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('schoolname')->nullable();
            $table->string('address')->nullable();
            $table->string('motor')->nullable();
            $table->text('logo')->nullable();
            
            $table->text('headteacher_comment')->nullable();
            $table->string('total')->nullable();
            $table->string('signature')->nullable();
            $table->string('lga')->nullable();
            $table->string('alms')->nullable();
            $table->string('ref_no')->nullable();

            $table->string('surname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('fname')->nullable();
            $table->string('phone')->nullable();
            $table->string('section')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('gender')->nullable();
            $table->string('classname')->nullable();
            $table->text('images')->nullable();
            $table->string('status')->nullable();
            $table->string('term')->nullable();
            $table->string('regnumber')->nullable();
            $table->string('slug')->nullable();
            
            $table->string('subjectname')->nullable();
            $table->string('test_1')->nullable();
            $table->string('test_2')->nullable();
            $table->string('exams')->nullable();
            $table->string('schooltype')->nullable();
            $table->string('average')->nullable();
            $table->string('position')->nullable();
            $table->string('conduct')->nullable();
            $table->string('ref_no2')->nullable();
            $table->string('dob')->nullable();
            $table->string('numberinclass')->nullable();
            $table->text('teacher_comment')->nullable();
            $table->text('headteach_comment')->nullable();
            $table->string('next_term')->nullable();
            $table->string('dayschopen')->nullable();
            $table->string('dayspresent')->nullable();
            $table->string('pins')->nullable();
            $table->string('nextterm_fee')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
