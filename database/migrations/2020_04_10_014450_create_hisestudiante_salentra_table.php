<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHisEstudianteSalEntraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_HisEstudianteSalida', function (Blueprint $table) {
            $table->id('Hisalida_ID');
            $table->unsignedInteger('Est_ID');
            
            $table->unsignedBigInteger('Usu_ID')->nullable();
            
            $table->unsignedBigInteger('Mot_ID');
            
            $table->date('hisalida_FechaInial');
            $table->date('hisalida_FechaSalida')->nullable();
            $table->date('hisalida_FechaEstimada')->nullable();
            $table->boolean('hisalida_RegActivo');
            $table->string('hisalida_Descripcion',200);
            $table->boolean('hisalida_Estado')->default(1);
            $table->timestamps();
        });

        Schema::table('TBL_HisEstudianteSalida', function ( $table) {
            $table->foreign('Est_ID')->references('Est_ID')->on('TBL_Estudiante');
            $table->foreign('Mot_ID')->references('Mot_ID')->on('TBL_MotivoSalida');
            $table->foreign('Usu_ID')->references('Usu_ID')->on('TBL_Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_his_estudiante_sal_entra');
    }
}
