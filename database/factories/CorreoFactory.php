<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntidadCorreo;
use App\Model;
use Faker\Generator as Faker;

$factory->define(EntidadCorreo::class, function (Faker $faker) {
    return [
        //
        'Per_ID' => $faker->unique()->numberBetween(1,70),
        'cor_Descripcion' => $faker->unique()->safeEmail,

    ];
});
