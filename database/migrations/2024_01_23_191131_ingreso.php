<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->id();   
           
            $table->date('fecha');
            $table->string('ndocumento');
            $table->string('tipodocumento');
            $table->string('ordencompra') ->nullable();
            $table->string('codigoproducto');
            $table->string('nombreproducto');
            $table->string('cantidad');
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
        //
    }
}
