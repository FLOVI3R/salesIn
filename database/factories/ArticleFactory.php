<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'image' => $faker->imageUrl,
        'description' => $faker->paragraph,
        'cicles_id' => \App\Cicle::all()->random()->id,
    ];
});
