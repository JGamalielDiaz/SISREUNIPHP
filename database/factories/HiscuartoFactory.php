<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntidadHisEstuCuarto;
use App\Model;
use Faker\Generator as Faker;

$factory->define(EntidadHisEstuCuarto::class, function (Faker $faker) {
    return [
        //
        'Est_ID'=> $faker->unique()->numberBetween(1,300),
        'Cuar_ID' =>$faker->numberBetween(1,25),
        'hisCuarto_FechaInicial'=> $faker->date(),
        'hisCuarto_FechaFinal' => null,
        'hisCuarto_MotivoCambio'=> $faker->text(20),
        'Usu_ID' => null,

    ];
});
