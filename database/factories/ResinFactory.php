<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\EntidadRecinto;
use Faker\Generator as Faker;

$factory->define(EntidadRecinto::class, function (Faker $faker) {
    return [
        //
        'rec_Descripcion' =>$faker->text(6)
    ];
});
