<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntidadTelefono;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(EntidadTelefono::class, function (Faker $faker) {
    return [
        //
        'Per_ID' => $faker->unique()->numberBetween(1,200),
        'tel_Numero' =>str::random(5),
        'tel_Estado' => 1,
    ];
});
