<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresoDelProyectosTable extends Migration
{
    public function up()
    {
        Schema::create('progreso_del_proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('progreso')->nullable();
            $table->datetime('fecha_de_actualizacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
