<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntidadBarrio;
use App\Model;
use Faker\Generator as Faker;

$factory->define(EntidadBarrio::class, function (Faker $faker) {
    return [
        //
        'Mun_ID' => rand(4,23),
        'bar_Nombre'=> $faker->city,
    ];
});
