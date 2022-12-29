<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->unsignedBigInteger('carrera_id')->nullable();
            $table->foreign('carrera_id', 'carrera_fk_7762481')->references('id')->on('carreras');
            $table->unsignedBigInteger('proyecto_id')->nullable();
            $table->foreign('proyecto_id', 'proyecto_fk_7762483')->references('id')->on('proyectos');
        });
    }
}
