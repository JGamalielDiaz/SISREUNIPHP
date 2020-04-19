<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntidadCorreo;
use App\Model;
use Faker\Generator as Faker;

$factory->define(EntidadCorreo::class, function (Faker $faker) {
    return [
        //
        'Per_ID' => rand(1,100),
        'cor_Descripcion' => $faker->unique()->safeEmail,
        'cor_Estado' => 1,

    ];
});
