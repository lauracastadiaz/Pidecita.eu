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
        Schema::create('centros_medicos', function (Blueprint $table) {
            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('medico_id');
            $table->timestamps();


            /* 
                $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
                $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centros_medicos');
    }
};
