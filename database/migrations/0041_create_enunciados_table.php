<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnunciadosTable extends Migration
{
    public function up()
    {
        Schema::create('enunciados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dimensiones_id')->unsigned();
            $table->foreign('dimensiones_id')->references('id')->on('dimensiones');
            $table->string('nivel_importancia');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enunciados');
    }
}
