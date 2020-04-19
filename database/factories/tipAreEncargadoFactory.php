<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntidadTipAreResponsa;
use App\Model;
use Faker\Generator as Faker;

$factory->define(EntidadTipAreResponsa::class, function (Faker $faker) {
    return [
        //
        'area_Descripcion' => $faker->unique()->sentence(10),
        'area_Estado'=> 1,

    ];
});
