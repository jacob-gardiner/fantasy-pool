<?php

use Faker\Generator as Faker;

$factory->define(App\GameAction::class, function (Faker $faker) {
    return [
        'name'    => $faker->sentence(3),
        'pool_id' => 1,
        'score'   => $faker->numberBetween(-50, 100),
    ];
});
