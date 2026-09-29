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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('school_id')->nullable();
            $table->string('schoolname')->nullable();
            $table->string('fname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('dob')->nullable();
            $table->string('centernumber')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->text('images')->nullable();
            $table->text('logo')->nullable();
            $table->string('motor')->nullable();
            $table->string('preclassname')->nullable();
            $table->string('age')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('term')->nullable();
            $table->string('classname')->nullable();
            $table->string('alms')->nullable();
            $table->string('section')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('schooltype')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('transferstudent')->nullable();
            $table->string('slug')->nullable();
            $table->string('regnumber')->nullable()->unique();
            $table->string('ref_no1')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
