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
        Schema::create('schoolnews', function (Blueprint $table) {
             $table->id();
            $table->string('user_id')->nullable();
            $table->string('school_id')->nullable();
            $table->string('title')->nullable();
            $table->string('schoolname')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
        
            $table->text('images1')->nullable();
            $table->text('images2')->nullable();
            $table->text('images3')->nullable();
            $table->text('images')->nullable();
            $table->text('images5')->nullable();
            $table->text('logo')->nullable();
            $table->text('messages')->nullable();
            $table->string('slug')->nullable();
            $table->string('slug1')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolnews');
    }
};
