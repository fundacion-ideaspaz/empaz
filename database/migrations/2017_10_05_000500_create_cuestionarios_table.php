<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuestionariosTable extends Migration
{
    public function up()
    {
        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('version');
            $table->string('estado');
            $table->integer('cuest_id_parent')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuestionarios');
    }
}
