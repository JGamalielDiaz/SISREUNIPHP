<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntidadCuarto;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Validation\Rules\Unique;

$factory->define(EntidadCuarto::class, function (Faker $faker) {
    return [
        //
        'cuar_Numero' =>$faker->unique()->numberBetween(1,25),
        'cuar_Ubicacion' => $faker->text(50),
        'Gen_ID' => rand(1,2),
    ];
});
