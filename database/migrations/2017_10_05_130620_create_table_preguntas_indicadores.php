<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePreguntasIndicadores extends Migration
{
    public function up()
    {
        Schema::create('preguntas_indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('preguntas_id')->unsigned();
            $table->foreign('preguntas_id')->references('id')->on('preguntas')->onDelete('cascade');
            $table->integer('indicadores_id')->unsigned();
            $table->foreign('indicadores_id')->references('id')->on('indicadores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preguntas_indicadores');
    }
}
