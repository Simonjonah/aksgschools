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
        Schema::create('teacherdomains', function (Blueprint $table) {
             $table->id();
            $table->string('teacher_id')->nullable();
            $table->string('schooltype')->nullable();
            $table->string('type')->nullable();
            $table->string('psycomoto')->nullable();
            $table->string('cogname');

            $table->string('ref_no1')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('connect')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacherdomains');
    }
};
