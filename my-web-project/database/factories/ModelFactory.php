<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement(['common user', 'doctor', 'coach']),
    ];
});

$factory->define(App\Data::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'sbp' => $faker->numberBetween(90, 150),
        'dbp' => $faker->numberBetween(60, 90),
        'heart_rate' => $faker->numberBetween(60, 160),
        'steps' => $faker->numberBetween(100, 30000),
        'sleep_time' => $faker->numberBetween(4*60, 12*60),
        'created_at' => $faker->numberBetween(strtotime('last year'), time())
    ];
});
