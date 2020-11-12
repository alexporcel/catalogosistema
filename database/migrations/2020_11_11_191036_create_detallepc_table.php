<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepc', function (Blueprint $table) {
            
            $table->unsignedBigInteger('idproducto')->unsigned();
            $table->unsignedBigInteger('idcompra')->unsigned();

            $table->foreign('idproducto')->references('id')->on('productos');
            $table->foreign('idcompra')->references('id')->on('compras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallepc');
    }
}
