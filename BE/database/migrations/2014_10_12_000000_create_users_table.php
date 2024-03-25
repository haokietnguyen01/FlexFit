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
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->enum('sex', ['male', 'female', 'pending'])->default('pending');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone')->nullable();
            $table->enum('role', ['admin', 'user', 'coach'])->default('user');
            $table->integer('payment_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
