<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProyectosTable extends Migration
{
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('asignatura_id')->nullable();
            $table->foreign('asignatura_id', 'asignatura_fk_7762855')->references('id')->on('asignaturas');
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id', 'estado_fk_7759671')->references('id')->on('estado_del_proyectos');
            $table->unsignedBigInteger('profesor_encargado_id')->nullable();
            $table->foreign('profesor_encargado_id', 'profesor_encargado_fk_7771471')->references('id')->on('users');
            $table->unsignedBigInteger('profesor_acompanante_id')->nullable();
            $table->foreign('profesor_acompanante_id', 'profesor_acompanante_fk_7771472')->references('id')->on('users');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7760328')->references('id')->on('teams');
        });
    }
}
