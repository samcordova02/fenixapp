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
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre');
            $table -> string('telefono');
            $table -> string('correo');
            $table -> string('cargo');
            $table -> string('imagen');
            
            $table->bigInteger('corporacion_id')-> unsigned ();
            $table->foreign('corporacion_id')->references('id')->on('corporaciones')->onDelete('cascade');
    

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
        Schema::dropIfExists('responsables');
    }
};
