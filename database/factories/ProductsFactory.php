<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Size;
use App\Products;
use App\Categories;
use Faker\Generator as Faker;
// $fake = \Faker\Factory::create();
// $fake->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($fake));

$factory->define(Products::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category' => $faker->numberBetween(1, Categories::count()),
        'image' => $faker->imageUrl($width = 640, $height = 480, 'food'),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 40),
        'sizes' => $faker->numberBetween(1, Size::count()),
        'description' => $faker->text(100)
    ];
});
