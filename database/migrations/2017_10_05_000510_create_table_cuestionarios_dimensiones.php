<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuestionariosDimensiones extends Migration
{
    public function up()
    {
        Schema::create('cuestionarios_dimensiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dimension_id')->unsigned();
            $table->foreign('dimension_id')->references('id')->on('dimensiones')->onDelete('cascade');
            $table->integer('cuestionario_id')->unsigned();
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade');
            $table->string('importancia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuestionarios_preguntas');
    }
}
