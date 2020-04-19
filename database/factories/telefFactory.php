<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntidadTelefono;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(EntidadTelefono::class, function (Faker $faker) {
    return [
        //
        'Per_ID' => $faker->unique()->rand(1,100),
        'tel_Numero' =>$faker->unique()->Str::random('8'),
        'tel_Estado' => 1,
    ];
});
