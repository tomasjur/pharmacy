<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prescription;
use Faker\Generator as Faker;

$factory->define(Prescription::class, function (Faker $faker) {
    return [
        'first_name' => $faker->unique()->firstName,
        'last_name' => $faker->unique()->lastName,
        'description' => $faker->text(100),
    ];
});
