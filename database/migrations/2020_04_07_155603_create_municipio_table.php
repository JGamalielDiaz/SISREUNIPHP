<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Municipio', function (Blueprint $table) {
            $table->id('Mun_ID');
            $table->string('mun_Nombre',60);
            $table->unsignedInteger('Dep_ID');
            $table->foreign('Dep_ID')->references('Dep_ID')->on('TBL_Departamento');
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
        Schema::dropIfExists('municipio');
    }
}
