<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Persona', function (Blueprint $table) {
            $table->increments('Per_ID');
            $table->string('per_Identificacion',25)->nullable();
            $table->unsignedInteger('Gen_ID')->nullable();
            $table->foreign('Gen_ID')->references('Gen_ID')->on('TBL_Genero');
            $table->string('per_Nombre',50);
            $table->string('per_Apellido',45);
            $table->date('per_fechaNacimiento')->nullable();
            $table->string('per_RutaImage')->nullable();
            $table->boolean('per_Estado')->default(1);
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
        Schema::dropIfExists('persona');
    }
}
