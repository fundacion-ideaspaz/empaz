<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDimensionesIndicadores extends Migration
{
    public function up()
    {
        Schema::create('dimension_indicador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dimension_id')->unsigned();
            $table->foreign('dimension_id')->references('id')->on('dimensiones')->onDelete('cascade');
            $table->integer('indicador_id')->unsigned();
            $table->foreign('indicador_id')->references('id')->on('indicadores')->onDelete('cascade');
            $table->integer('cuestionario_id')->unsigned();
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade');
            $table->string('nivel_importancia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimension_indicador');
    }
}
