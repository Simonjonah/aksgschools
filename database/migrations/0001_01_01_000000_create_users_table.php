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
        Schema::create('users', function (Blueprint $table) {
             $table->id();
            
            $table->string('code_id')->nullable();
            $table->string('code')->nullable();
            $table->string('connect')->nullable();
            $table->string('schoolname')->nullable();
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
            $table->string('fname')->nullable();
            $table->string('schooltype')->nullable();
            $table->string('type')->nullable();
            $table->string('school_id')->nullable();
            // $table->string('user_id')->nullable();
            
            $table->string('surname')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('slug')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('transferprin')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
