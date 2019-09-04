<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Weather;
use Faker\Generator as Faker;

$factory->define(Weather::class, function (Faker $faker) {
    return [
        'city_id' => function() {
            return factory(App\City::class)->create()->id;
        },
        'date' => $faker->date('Y-m-d'),
        'precipitation' => $faker->randomElement(array('ясно', 'пасмурно', 'осадки')),
        'temperature' => $faker->numberBetween(0, 30),
    ];
});
