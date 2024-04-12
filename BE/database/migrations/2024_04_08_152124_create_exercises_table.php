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
        Schema::create('Exercises', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->Integer('set');
            $table->Integer('rep');
            $table->Integer('time_minutes');
            $table->Integer('calo_kcal');
            $table->Integer('id_type_ex');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Exercises');
    }
};
