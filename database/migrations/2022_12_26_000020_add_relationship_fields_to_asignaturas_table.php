<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAsignaturasTable extends Migration
{
    public function up()
    {
        Schema::table('asignaturas', function (Blueprint $table) {
            $table->unsignedBigInteger('carrera_id')->nullable();
            $table->foreign('carrera_id', 'carrera_fk_7762475')->references('id')->on('carreras');
        });
    }
}
