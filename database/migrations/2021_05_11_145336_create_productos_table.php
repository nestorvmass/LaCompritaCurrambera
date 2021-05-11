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
            // Campos propios
            $table->integer('id_vendedor');
            $table->string('nom_producto');
            $table->integer('precio_producto');
            $table->integer('stock_producto');
            $table->text('desc_producto');
            $table->String('imagen_producto');
            $table->boolean('estado_producto');

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
        Schema::dropIfExists('productos');
    }
}
