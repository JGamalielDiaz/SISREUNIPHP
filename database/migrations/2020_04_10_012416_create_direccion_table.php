<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Direccion', function (Blueprint $table) {
            $table->id('Dir_ID');
            $table->unsignedBigInteger('Mun_ID');
            $table->foreign('Mun_ID')->references('Mun_ID')->on('TBL_Municipio');
            $table->unsignedInteger('Per_ID')->nullable();
            $table->foreign('Per_ID')->references('Per_ID')->on('TBL_Persona');
            $table->string('dir_Descripcion',170);
            $table->boolean('dir_Estado')->default(1);
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
        Schema::dropIfExists('direccion');
    }
}
