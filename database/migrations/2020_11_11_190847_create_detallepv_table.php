<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepv', function (Blueprint $table) {
            
            $table->unsignedBigInteger('idproducto')->unsigned();
            $table->unsignedBigInteger('idventa')->unsigned();

            $table->foreign('idproducto')->references('id')->on('productos');
            $table->foreign('idventa')->references('id')->on('ventas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallepv');
    }
}
