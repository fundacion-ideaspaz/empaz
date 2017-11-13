<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePreguntasIndicadores extends Migration
{
    public function up()
    {
        Schema::create('indicador_pregunta', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('required');
            $table->integer('pregunta_id')->unsigned();
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
            $table->integer('indicador_id')->unsigned();
            $table->foreign('indicador_id')->references('id')->on('indicadores')->onDelete('cascade');
            $table->integer('cuestionario_id')->unsigned();
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('indicador_pregunta');
    }
}
