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
        Schema::create('centros_especialidades', function (Blueprint $table) {
            $table->unsignedBigInteger('centros_id');
            $table->unsignedBigInteger('especialidad_id');


            /* 
                $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
                $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('cascade');
            */
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centros_especialidades');
    }
};
