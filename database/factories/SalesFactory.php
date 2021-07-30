<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Sale::class, function (Faker $faker) {
    return [
        'seller_id' => random_int(1, 10),
        'comission' => $faker->randomFloat(2, 0,4),
        'sale_value' => $faker->randomFloat(2, 2,8)
    ];
});
