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
        Schema::create('corporacion', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre');
            $table -> string('rif');
            $table -> string('imagen');
            $table -> string('telefono');
            $table -> string('gabinte_id');
            $table -> string('dirrecion_id');
            $table -> string('responsable');

            $table -> string('correo');






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
        Schema::dropIfExists('corporacion');
    }
};
