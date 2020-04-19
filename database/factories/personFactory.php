<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Repositories\Persona\EntidadPersona;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

$factory->define(EntidadPersona::class, function (Faker $faker) {
    return [
        //
        'per_Identificacion' => Str::random(10),
        'Gen_ID' => rand(1,2),
        'per_Nombre' => $faker->name,
        'per_Apellido' => $faker->lastName,
        'per_fechaNacimiento' => $faker->date,
        'per_RutaImage' => null,
        'per_Estado' => 1,

    ];
});
