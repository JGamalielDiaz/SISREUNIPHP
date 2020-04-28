<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorreoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Correo', function (Blueprint $table) {
            $table->id('Cor_ID');
            $table->unsignedInteger('Per_ID');
            $table->foreign('Per_ID')->references('Per_ID')->on('TBL_Persona');
            $table->string('cor_Descripcion',50);
            $table->boolean('cor_Estado')->default(1);
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
        Schema::dropIfExists('TBL_Correo');
    }
}
