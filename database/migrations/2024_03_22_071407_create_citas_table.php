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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("medico_id"); //no obligatorio
            $table->unsignedBigInteger("paciente_id"); 
            $table->unsignedBigInteger("especialidad_id"); //no obligatorio
            $table->enum('estado', ['confirmada', 'pendiente', 'cancelada', 'completada']);
            $table->dateTime('fechaHora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
