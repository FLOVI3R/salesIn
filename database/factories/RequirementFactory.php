<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Requirement;
use Faker\Generator as Faker;

$factory->define(Requirement::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'offer_id' => \App\Offer::all()->random()->id,
    ];
});
