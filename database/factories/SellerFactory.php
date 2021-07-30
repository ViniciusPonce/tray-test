<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


    use Faker\Generator as Faker;

$factory->define(\App\Models\Seller::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'comission' => 8.5
    ];
});
