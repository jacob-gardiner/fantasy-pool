<?php

use Faker\Generator as Faker;

$factory->define(App\Houseguest::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'photo'   =>  config('app.avatar_default'),
        'evicted' => 0,
        'pool_id' => 1,
    ];
});
