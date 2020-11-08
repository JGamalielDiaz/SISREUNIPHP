<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Repositories\Estudiante\EntidadEstudiante;

use Faker\Generator as Faker;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Str;

$factory->define(EntidadEstudiante::class, function (Faker $faker) {
    return [
        //
        'Est_ID' => $faker->unique()->numberBetween(1,300),
        'Car_ID' => rand(1,5),
        'est_Carnet'=> str::random(5),
        'est_FechaInicial' => $faker->date(),
        'est_FechaFinal'=> null,
    ];
});
