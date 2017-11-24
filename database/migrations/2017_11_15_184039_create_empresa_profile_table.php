<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaProfileTable extends Migration
{
    public function up()
    {
        Schema::create('empresa_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('pais');
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('direccion');
            $table->string('telefono');
            $table->string('web');
            $table->string('nit');
            $table->string('tamano');
            $table->string('num_trabajadores');
            $table->string('sector_economico');
            $table->string('codigo_ciiu');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresa_profile');
    }
}
