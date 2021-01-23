<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;


$factory->define(Category::class, function (Faker $faker) {
    $generos = \App\Genero::all();
    return [
        'name' => $faker->colorName,
        'genero_id' => $generos[rand(0,9)]->id
    ];
});
