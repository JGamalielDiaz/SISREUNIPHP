<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntidadDireccion;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Validation\Rules\Unique;

$factory->define(EntidadDireccion::class, function (Faker $faker) {
    return [
        //
        'Mun_ID' =>$faker->numberBetween($min = 4, $max = 23),
        'Per_ID'=> $faker->numberBetween($min = 1, $max = 90),
        'dir_Descripcion' => $faker->text(5),
        'dir_Estado'=> 1,

    ];
});
