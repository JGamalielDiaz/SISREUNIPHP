<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionAseoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_AsignacionAseo', function (Blueprint $table) {
            $table->id('RolAseo_ID');
            $table->unsignedInteger('TipoAseo_ID');
            $table->foreign('TipoAseo_ID')->references('TipoAseo_ID')->on('TBL_TipoAseo');
            $table->unsignedInteger('Fre_ID');
            $table->foreign('Fre_ID')->references('Fre_ID')->on('TBL_Frecuencia');
            $table->unsignedBigInteger('Usu_ID');
            $table->foreign('Usu_ID')->references('Usu_ID')->on('TBL_Usuario');
            $table->unsignedInteger('Est_ID');
            $table->foreign('Est_ID')->references('Est_ID')->on('TBL_Estudiante');
            $table->date('rolAseo_FechaInicial');
            $table->date('rolAseo_FechaFinal')->nullable();
            $table->date('rolAseo_FechaDeshabilitado')->nullable();
            $table->time('rolAseo_Hora')->nullable();
            $table->integer('rolAseo_Dia')->nullable();
            $table->boolean('rolAseo_Estado')->default(1);
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
        Schema::dropIfExists('_asignacion_aseo');
    }
}
