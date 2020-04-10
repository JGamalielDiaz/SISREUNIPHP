<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Estudiante', function (Blueprint $table) {
            $table->unsignedInteger('Est_ID')->primary();
            $table->unsignedInteger('Car_ID');
            $table->foreign('Car_ID')->references('Car_ID')->on('TBL_Carrera');
            $table->string('est_Carnet',10);
            $table->date('est_FechaInicial');
            $table->date('est_FechaFinal')->nullable();
            $table->boolean('est_Estado');
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
        Schema::dropIfExists('estudiante');
    }
}
