<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntidadDepartamento;
use App\Model;
use Faker\Generator as Faker;

$factory->define(EntidadDepartamento::class, function (Faker $faker) {
    return [
        //
        'dep_Nombre'=> $faker->unique()->country,
        
    ];
});
