<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RespuestasCuestionarios extends Migration
{
    public function up()
    {
        Schema::create('respuestas_cuestionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opcion_respuesta_id')->unsigned();
            $table->foreign('opcion_respuesta_id')->references('id')->on('opciones_respuestas')->onDelete('cascade');
            $table->integer('pregunta_id')->unsigned();
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
            $table->integer('cuestionario_result_id')->unsigned();
            $table->foreign('cuestionario_result_id')->references('id')->on('cuestionarios_result')->onDelete('cascade');
            $table->integer('cuestionario_id')->unsigned();
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('respuestas_cuestionarios');
    }
}
