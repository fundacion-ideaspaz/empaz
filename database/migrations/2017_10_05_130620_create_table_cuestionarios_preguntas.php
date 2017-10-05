<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuestionariosPreguntas extends Migration
{
    public function up()
    {
        Schema::create('cuestionarios_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('preguntas_id')->unsigned();
            $table->foreign('preguntas_id')->references('id')->on('preguntas')->onDelete('cascade');
            $table->integer('cuestionarios_id')->unsigned();
            $table->foreign('cuestionarios_id')->references('id')->on('cuestionarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuestionarios_preguntas');
    }
}
