<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleIngresoTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ingreso');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->timestamps();

            // Relaciones
            $table->foreign('id_ingreso')->references('id')->on('ingreso');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_ingreso');
    }
}
