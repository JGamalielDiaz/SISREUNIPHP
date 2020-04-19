<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoEstudianteCuartoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_HistoEstuCuarto', function (Blueprint $table) {
            $table->id('HisCuarto_ID');
            $table->unsignedInteger('Est_ID');
            $table->foreign('Est_ID')->references('Est_ID')->on('TBL_Estudiante');
            $table->unsignedInteger('Cuar_ID');
            $table->foreign('Cuar_ID')->references('Cuar_ID')->on('TBL_Cuarto');
            $table->unsignedBigInteger('Usu_ID')->nullable();
            $table->foreign('Usu_ID')->references('Usu_ID')->on('TBL_Usuario');
            $table->date('hisCuarto_FechaInicial');
            $table->date('hisCuarto_FechaFinal')->nullable();
            $table->string('hisCuarto_MotivoCambio',180)->nullable();
            $table->boolean('hisCuarto_Estado');
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
        Schema::dropIfExists('_histo_estudiante_cuarto');
    }
}
