<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoAsignacionesAseoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Histo_Asignaciones_aseo', function (Blueprint $table) {
            $table->id('HisAseo_ID');
            $table->unsignedBigInteger('RolAseo_ID');
            $table->foreign('RolAseo_ID')->references('RolAseo_ID')->on('TBL_AsignacionAseo');
            $table->unsignedBigInteger('Usu_ID');
            $table->foreign('Usu_ID')->references('Usu_ID')->on('TBL_Usuario');
            $table->boolean('hisAseo_Cumple');
            $table->date('hisAseo_Fecha');
            $table->string('hisAseo_Descripcion',150);
            $table->boolean('hisAseo_Estado');
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
        Schema::dropIfExists('_histo_asignaciones_aseo');
    }
}
