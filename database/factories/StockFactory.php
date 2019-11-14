<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(stock::class, function (Faker $faker) {
    return [
        'product' => $faker->unique()->word,
        'quantity' => $faker->numberBetween(0, 150)
    ];
});
