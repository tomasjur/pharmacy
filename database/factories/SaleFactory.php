<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'product' => $faker->word,
        'quantity' => $faker->randomDigit,
        'price' => $faker->randomFloat(2, 5, 30),
    ];
});
