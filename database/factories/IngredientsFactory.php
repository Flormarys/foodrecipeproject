<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredients;
use Faker\Generator as Faker;

$factory->define(Ingredients::class, function (Faker $faker) {
    $now = date("Y-m-d H:i:s");
    return [
        'price' => $faker->numberBetween($min = 10, $max = 1000),
        'quantity' => $faker->numberBetween($min = 1, $max = 50),
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
