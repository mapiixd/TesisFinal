<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProgresoDelProyectosTable extends Migration
{
    public function up()
    {
        Schema::table('progreso_del_proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id')->nullable();
            $table->foreign('proyecto_id', 'proyecto_fk_7779293')->references('id')->on('proyectos');
        });
    }
}
