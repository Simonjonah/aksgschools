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
        Schema::create('studentdomains', function (Blueprint $table) {
             $table->id();
            $table->string('cogname')->nullable();
            $table->string('psycomoto')->nullable();
            $table->string('punt1')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('schooltype')->nullable();
            $table->string('type')->nullable();
            $table->string('user_id')->nullable();
            
            $table->string('school_id')->nullable();
            $table->string('alms')->nullable();
            
            $table->string('regnumber')->nullable();
            $table->string('classname')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('section')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('punt2')->nullable();
            $table->string('punt3')->nullable();
            $table->string('punt4')->nullable();
            $table->string('punt5')->nullable();
            $table->string('term')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('connect')->nullable();
            $table->string('teacher_comment')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentdomains');
    }
};
