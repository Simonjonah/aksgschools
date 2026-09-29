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
        Schema::create('teacherassigns', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('school_id')->nullable();
            $table->string('schooltype')->nullable();
            $table->string('type')->nullable();
            $table->string('slug')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('classname')->nullable();
            $table->string('section')->nullable();
            $table->string('images')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('term')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacherassigns');
    }
};
