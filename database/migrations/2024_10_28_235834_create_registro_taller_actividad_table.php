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
        Schema::create('registro_taller_actividad', function (Blueprint $table) {
            $table->foreignId('taller_actividad_id')->constrained('taller_actividad');
            $table->foreignId('registro_id')->constrained('registros');
            $table->primary(['taller_actividad_id', 'registro_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_taller_actividad');
    }
};
