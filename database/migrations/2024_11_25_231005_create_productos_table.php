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
            $table->unsignedBigInteger('marcas_id'); // Columna marcas_id
            $table->integer('stock');
             $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('bodega_id');
            $table->timestamps();
            $table->unsignedBigInteger('categoria_id'); // Columna categoria_id
        
            // Claves foráneas
            $table->foreign('marcas_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('bodega_id')->references('id')->on('bodegas')->onDelete('cascade');
                
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
