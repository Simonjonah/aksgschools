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
        Schema::create('assignsubjects', function (Blueprint $table) {
             $table->id();
            $table->string('user_id')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('connect')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('school_id')->nullable();
            $table->string('section')->nullable();
            $table->string('subsection')->nullable();
            $table->string('classname')->nullable();
            $table->string('subjectname')->nullable();
            $table->string('alms')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('status')->nullable();
            $table->string('term')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignsubjects');
    }
};
