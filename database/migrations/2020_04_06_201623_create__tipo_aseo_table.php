<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoAseoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_TipoAseo', function (Blueprint $table) {
            $table->increments('TipoAseo_ID');
            $table->string('tipoAseo_Nombre',25)->unique();
            $table->unsignedInteger('Fre_ID');
            $table->foreign('Fre_ID')->references('Fre_ID')->on('TBL_Frecuencia');
            $table->boolean('tipoAseo_Estado');
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
        Schema::dropIfExists('_tipo_aseo');
    }
}
