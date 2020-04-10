<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Telefono', function (Blueprint $table) {
            $table->id('tel_ID');
            $table->unsignedInteger('Per_ID');
            $table->foreign('Per_ID')->references('Per_ID')->on('TBL_Persona');
            $table->string('tel_Numero',15);
            $table->boolean('tel_Estado');
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
        Schema::dropIfExists('telefono');
    }
}
