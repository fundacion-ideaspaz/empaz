<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DimensionIndicadorTableOncascadeIndicador2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('dimension_indicador', function (Blueprint $table) {
        $table->integer('cuestionario_dimension_id')->unsigned()->nullable();
        $table->foreign('cuestionario_dimension_id')
        ->references('id')
        ->on('cuestionarios_dimensiones')
        ->onDelete('cascade');
      });
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
