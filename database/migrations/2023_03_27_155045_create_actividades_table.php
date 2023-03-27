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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->double('costo', 25, 2)->nullable();
            
            $table->string('status');
            $table->double('cantidad', 25, 2)->nullable();
            $table->text('descripcion');

            $table->bigInteger('proyecto_id')->unsigned();
            $table->bigInteger('responsable_id')->unsigned();
            $table->bigInteger('direcion_id')->unsigned();
            
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('responsable_id')->references('id')->on('responsables')->onDelete('cascade');
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
        Schema::dropIfExists('actividades');
    }
};
