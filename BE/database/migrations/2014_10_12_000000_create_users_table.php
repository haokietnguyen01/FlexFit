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
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Name');
            $table->enum('Sex', ['Male', 'Female', 'Pending'])->nullable();
            $table->integer('Age')->nullable();
            $table->string('Image')->nullable();
            $table->string('Phone')->nullable();
            $table->unsignedTinyInteger('Role_id')->default(1)->comment('0: Admin, 1: User, 2: Coach');
            $table->integer('Payment_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
