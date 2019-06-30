<?php

use App\FantasyPool;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::all()->pluck('id')->toArray()),
        'pool_id' => $faker->randomElement(FantasyPool::all()->pluck('id')->toArray()),
    ];
});
