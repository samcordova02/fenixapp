<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\Cast\Double;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('duracion');
            $table->double('costo', 25, 2)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('status');
            $table->double('cantidad', 25, 2)->nullable();
            $table->bigInteger('unidad_id')->unsigned();

            $table->bigInteger('responsable_id')->unsigned();
            $table->bigInteger('corporacion_id')->unsigned();
            

            $table->foreign('responsable_id')->references('id')->on('responsables')->onDelete('cascade');
            $table->foreign('corporacion_id')->references('id')->on('corporaciones')->onDelete('cascade');
            $table->foreign('unidad_id')->references('id')->on('unidadmedidas')->onDelete('cascade');



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
        Schema::dropIfExists('proyectos');
    }
};
