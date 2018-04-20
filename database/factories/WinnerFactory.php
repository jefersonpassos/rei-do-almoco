<?php

use Faker\Generator as Faker;
use App\Models\Winner;

$factory->define(Winner::class, function (Faker $faker) {
    return [
        'applicant_id' => factory('App\Models\Applicant')->create()->id
    ];
});
