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
        Schema::create('direccion', function (Blueprint $table) {
            $table->id();
            $table -> string('descripcion');
            
            $table -> bigInteger('municipios_id')-> unsigned ();
            $table->foreign('municipios_id')->references('id')->on('municipios')->onDelete('cascade');
            
            $table -> bigInteger('parroquias_id')-> unsigned ();
            $table->foreign('parroquias_id')->references('id')->on('parroquias')->onDelete('cascade');
    
            
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
        Schema::dropIfExists('direccion');
    }
};
