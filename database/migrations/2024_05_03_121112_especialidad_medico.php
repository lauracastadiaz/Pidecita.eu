<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EspecialidadMedico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_medico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('especialidad_id'); 

            $table->timestamps();
            /* 
                $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
                $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('cascade');
            */
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
