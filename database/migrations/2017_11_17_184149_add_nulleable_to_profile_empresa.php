<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNulleableToProfileEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresa_profile', function (Blueprint $table) {
            // $table->string('departamento')->nullable()->change();
            // $table->string('municipio')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresa_profile', function (Blueprint $table) {
            // $table->string('departamento')->nullable(false)->change();
            // $table->string('municipio')->nullable(false)->change();
        });
    }
}
