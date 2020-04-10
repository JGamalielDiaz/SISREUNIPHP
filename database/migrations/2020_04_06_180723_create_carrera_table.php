<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Carrera', function (Blueprint $table) {
            $table->increments('Car_ID');
            $table->string('car_Nombre',40)->unique();
            $table->string('car_Descrip',190);
            $table->unsignedInteger('Rec_ID');
            $table->foreign('Rec_ID')->references('Rec_ID')->on('TBL_Recinto');
            $table->boolean('car_Estado');
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
        Schema::dropIfExists('carrera');
    }
}
