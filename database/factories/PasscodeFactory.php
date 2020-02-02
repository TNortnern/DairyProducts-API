<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Passcode;
use Faker\Generator as Faker;

$factory->define(Passcode::class, function (Faker $faker) {
    return [
        "passcode" => $faker->cvr,
        'is_active' => 1
    ];
});
