<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio_anterior', 10, 2)->nullable();
            $table->decimal('precio_actual', 10, 2);
            $table->string('descripcion')->nullable();
            $table->text('descripcion_detallada')->nullable();
            $table->string('icono')->nullable();
            $table->string('enlace')->nullable();
            $table->timestamps();
            $table->json('caracteristicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precios');
    }
}
