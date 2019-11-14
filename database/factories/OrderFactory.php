<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'supplier' => $faker->company,
        'product' => $faker->unique()->word,
        'quantity' => $faker->numberBetween(2, 50),
        'price' => $faker->randomFloat(2, 5, 1500),
    ];
});
