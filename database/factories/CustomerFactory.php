<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\User;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'active' => random_int(0, 1),
        'name' => $faker->name,
    ];
});
