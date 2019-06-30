<?php

use App\GameAction;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\FantasyPool::class, function (Faker $faker) {
    return [
        'name'        => $faker->sentence(4),
        'show_name'   => 'big_brother',
        'owner_id'    => $faker->randomElement(User::all()->pluck('id')->toArray()),
        'photo'       => 'images/big-brother-celebrity-2019.png',
    ];
});
