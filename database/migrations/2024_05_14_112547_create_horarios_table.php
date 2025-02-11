<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centro_id');
            $table->longText('lunes');
            $table->longText('martes');
            $table->longText('miercoles');
            $table->longText('jueves');
            $table->longText('viernes');
            $table->longText('sabado');
            $table->longText('domingo');
            $table->longText('fechas_no_disponibles')->nullable();
            $table->longText('dias_descanso')->nullable();
            $table->longText('fechas_excepcionales')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
