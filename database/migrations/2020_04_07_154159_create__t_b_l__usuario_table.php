<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBLUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Usuario', function (Blueprint $table) {
            $table->id('Usu_ID');
            $table->unsignedInteger('Per_ID');
            $table->foreign('Per_ID')->references('Per_ID')->on('TBL_Persona');
            $table->string('usu_Login',15);
            $table->string('usu_Password',15);
            $table->date('usu_Ult_Ingreso');
            $table->date('usu_FechaInicial');
            $table->date('usu_FechaFinal')->nullable();
            $table->boolean('usu_Estado');
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
        Schema::dropIfExists('_t_b_l__usuario');
    }
}
