<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idrol')->unsigned();
            $table->string('nombre',50)->unique();
            $table->integer('telefono');
            $table->string('correo',50);
            $table->string('direccion',200);
            $table->integer('ci');
            $table->string('user',50);
            $table->string('contrasena',50);
            $table->boolean('estado',20);
            $table->timestamps();

            $table->foreign('idrol')->references('id')->on('rols');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
