<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Responsable', function (Blueprint $table) {
            $table->increments('Per_ID');
            $table->unsignedInteger('Area_ID');
            $table->foreign('Area_ID')->references('Area_ID')->on('TBL_TipoArea_Responsable');
            $table->date('res_FechaInicio');
            $table->date('res_FechaFinal')->nullable();
            $table->boolean('res_Estado')->default(1);
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
        Schema::dropIfExists('responsable');
    }
}
