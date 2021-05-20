<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            //Nombre_tienda
            // administrador_tienda
            // direccion_tienda
            // categoria_tienda
            // correo_empresa
            // camara_comercio_tienda
            // fecha_apertura_tienda
            $table->id();
            $table->string('Nombre_tienda');
            $table->integer('cod_administrador');
            $table->string('categoria_tienda');
            $table->text('direccion_tienda');
            $table->string('telefono_tienda');
            $table->text('correo_empresa');
            $table->text('camara_comercio_tienda');
            $table->timestamp('fecha_apertura_tienda')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiendas');
    }
}
