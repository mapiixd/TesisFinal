<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarrerasTable extends Migration
{
    public function up()
    {
        Schema::table('carreras', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_7569823')->references('id')->on('areas');
        });
    }
}
