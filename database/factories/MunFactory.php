<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntidadMunicipio;
use App\Model;
use Faker\Generator as Faker;

$factory->define(EntidadMunicipio::class, function (Faker $faker) {
    return [
        //
        'mun_Nombre' => $faker->unique()->city,
        'Dep_ID' => rand(1,10),
    ];
});
