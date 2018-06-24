<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DimensionIndicadorTableOncascadeIndicador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('dimension_indicador', function (Blueprint $table) {

        $table->dropForeign('dimension_indicador_dimension_id_foreign');
        $table->dropForeign('dimension_indicador_cuestionario_id_foreign');
        $table->foreign('dimension_id')->references('id')->on('dimensiones')->onDelete('cascade')->change();
        $table->foreign('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade')-change();
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
