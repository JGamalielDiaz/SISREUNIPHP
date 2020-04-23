<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntidadCarrera;
use App\Model;
use Faker\Generator as Faker;

$factory->define(EntidadCarrera::class, function (Faker $faker) {
    return [
        //
        'car_Nombre' => $faker->text(10),
        'car_Descrip'=> $faker->text(10),
        'Rec_ID'=> rand(1,3),
        'car_Estado' => 1,

    ];
});