<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'date_max' => $faker->dateTime,
        'num_candidates' => $faker->randomNumber,
        'cicles_id' => \App\Cicle::all()->random()->id,
    ];
});
