<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntidadCuarto;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Validation\Rules\Unique;

$factory->define(EntidadCuarto::class, function (Faker $faker) {
    return [
        //
        'cuar_Numero' => rand(1,20),
        'cuar_Ubicacion' => $faker->text(50),
        'Gen_ID' => rand(1,2),
        'cuar_Estado'=>1,
    ];
});
