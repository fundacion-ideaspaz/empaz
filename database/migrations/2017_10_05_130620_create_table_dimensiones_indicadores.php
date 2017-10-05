<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDimensionesIndicadores extends Migration
{
    public function up()
    {
        Schema::create('indicadores_dimensiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dimensiones_id')->unsigned();
            $table->foreign('dimensiones_id')->references('id')->on('dimensiones')->onDelete('cascade');
            $table->integer('indicadores_id')->unsigned();
            $table->foreign('indicadores_id')->references('id')->on('indicadores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('indicadores_dimensiones');
    }
}
