<?php

use Faker\Generator as Faker;
use App\Models\Vote;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'applicant_id' => factory('App\Models\Applicant')->create()->id,
        'total_votes' => 0
    ];
});
