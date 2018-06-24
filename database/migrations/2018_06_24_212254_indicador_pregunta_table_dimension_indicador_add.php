<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IndicadorPreguntaTableDimensionIndicadorAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      {
        Schema::table('indicador_pregunta', function (Blueprint $table) {
          $table->integer('dimension_indicador_id')->unsigned()->nullable();
          $table->foreign('dimension_indicador_id')
          ->references('id')
          ->on('dimension_indicador')
          ->onDelete('cascade');
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
