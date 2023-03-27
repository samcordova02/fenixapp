<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporaciones', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre');
            $table -> string('rif');
            $table -> string('imagen');
            $table -> string('telefono');

            
            
            $table -> string('responsable');

            $table -> string('correo');
            $table->bigInteger('gabinete_id')->unsigned();
            $table->bigInteger('direcion_id')->unsigned();

            $table->foreign('gabinete_id')->references('id')->on('gabinetes')->onDelete('cascade');
            $table->foreign('direcion_id')->references('id')->on('direcciones')->onDelete('cascade');






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
        Schema::dropIfExists('corporaciones');
    }
};
