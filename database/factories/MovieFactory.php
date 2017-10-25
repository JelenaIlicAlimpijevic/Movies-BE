<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'director' => $faker->name,
        'image_url' => $faker->imageUrl,
        'duration' => $faker->randomDigit ,
        'relase_date' => $faker->date,
        'generes' => $faker->text,
    ];
});
