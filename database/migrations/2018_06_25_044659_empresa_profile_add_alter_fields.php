<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpresaProfileAddAlterFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('empresa_profile', function (Blueprint $table) {
        $table->string('codigo_ciiu')->nullable()->change();
        $table->renameColumn('codigo_ciiu', 'ciiu_principal');
        $table->string('ciiu_secundario')->nullable();
        $table->string('nit')->nullable()->change();
        $table->string('web')->nullable()->change();
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
