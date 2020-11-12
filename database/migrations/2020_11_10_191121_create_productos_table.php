<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idmarca')->unsigned();
            $table->unsignedBigInteger('idcategoria')->unsigned();
            $table->string('nombre',50)->unique();
            $table->string('descripcion',100);
            $table->string('foto');
            $table->integer('cantidad');
            $table->decimal('precioventa',11,2);
            $table->boolean('estado');
            $table->timestamps();

            $table->foreign('idmarca')->references('id')->on('marcas');
            $table->foreign('idcategoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
