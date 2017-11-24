<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCuestParentColumnToCuestionarios extends Migration
{
    public function up()
    {
        Schema::table('cuestionarios', function (Blueprint $table) {
            // $table->integer('cuest_id_parent')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cuestionarios', function (Blueprint $table) {
            // $table->dropColumn('cuest_id_parent');
        });
    }
}
