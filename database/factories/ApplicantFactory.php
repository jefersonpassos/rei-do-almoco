<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Applicant::class, function (Faker $faker) {
    return [
        'name' =>  $faker->name,
        'email' => $faker->unique()->safeEmail
    ];
});
