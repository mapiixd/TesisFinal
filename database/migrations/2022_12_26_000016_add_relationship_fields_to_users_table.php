<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_7771600')->references('id')->on('areas');
            $table->unsignedBigInteger('carrera_id')->nullable();
            $table->foreign('carrera_id', 'carrera_fk_7570402')->references('id')->on('carreras');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7760306')->references('id')->on('teams');
        });
    }
}
