<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntidadDireccion;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Validation\Rules\Unique;

$factory->define(EntidadDireccion::class, function (Faker $faker) {
    return [ 
        //x
        'Mun_ID' =>$faker->numberBetween($min = 1, $max = 20),
        'Per_ID'=> $faker->unique()->numberBetween(1,80),
        'dir_Descripcion' => $faker->text(5),

    ];
});
