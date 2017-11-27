<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->string('email')->unique();
            $table->string('nombre');
            $table->string('cargo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('password');
            $table->string('confirmation_code')->nullable();
            $table->string('estado')->default('activo');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
