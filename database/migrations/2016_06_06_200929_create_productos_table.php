<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('nombre');
            $table->integer('id_subcateg')->unsigned();
            $table->foreign('id_subcateg')->references('id')->on('subcategorias');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->timestamps();
        });

        Schema::create('almacen_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('almacen_id')->unsigned();
            $table->integer('producto_id')->unsigned();

            $table->foreign('almacen_id')
                ->references('id')
                ->on('almacenes')->onDelete('cascade');

            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('almacen_producto');
        Schema::drop('productos');
    }
}
