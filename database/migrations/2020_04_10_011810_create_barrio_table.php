<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarrioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Barrio', function (Blueprint $table) {
            $table->id('Bar_ID');
            $table->unsignedBigInteger('Mun_ID');
            $table->foreign('Mun_ID')->references('Mun_ID')->on('TBL_Municipio');
            $table->string('bar_Nombre',25);
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
        Schema::dropIfExists('barrio');
    }
}
