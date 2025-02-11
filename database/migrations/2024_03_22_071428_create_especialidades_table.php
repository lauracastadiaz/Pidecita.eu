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
        Schema::create('especialidades', function (Blueprint $table) {
            $table->id();
            $table->enum('nombre', 
            ['veterinaria', 'odontología', 'neurología', 'neumología', 'nutricion', 'oftalmologia',
            'fisiologia', 'dermatologia', 'pediatria', 'psiquiatria', 'psicologia', 'traumatologia',
            'cardiologia', 'ginecologia', 'endocrinologia', 'genetica'
            ]);
            $table->string('descripcion');
            $table->string('duracion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidades');
    }
};
