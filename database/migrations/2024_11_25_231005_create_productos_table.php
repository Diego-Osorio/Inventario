<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->unsignedBigInteger('marcas_id');
            $table->integer('stock');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('bodega_id');
            $table->timestamps();
            $table->unsignedBigInteger('categoria_id'); // Asegúrate de usar unsignedBigInteger
            $table->foreign('categoria_id')->references('id')->on('categorias');
            // Definir las claves foráneas si existen las tablas correspondientes
           
            $table->foreign('marcas_id')->references('id')->on('marcas');
            $table->foreign('bodega_id')->references('id')->on('bodegas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
