<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categories;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'catname' => $faker->name,
        'catdescription' => $faker->text,
        'catimage' => $faker->imageUrl($width = 640, $height = 480, 'food'),
    ];
});
