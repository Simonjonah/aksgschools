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
        Schema::create('schools', function (Blueprint $table) {
           $table->id();
            $table->string('user_id')->nullable();
            $table->string('connect')->nullable();
            $table->string('schoolname')->nullable();
            $table->string('schooltype')->nullable();
            $table->string('type')->nullable();
            $table->string('centernumber')->nullable();
            $table->string('address')->nullable();
            $table->string('motor')->nullable();
            $table->string('phone')->nullable();
            $table->string('establishdate')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('logo')->nullable();
            $table->text('images')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('plans')->nullable();
            $table->string('term')->nullable();
            // $table->string('schooltype')->nullable();
            $table->string('section')->nullable();
            
            $table->string('surname')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('slug')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('transferprin')->nullable();

            $table->string('email')->unique()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
