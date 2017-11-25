<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cpf' => $faker->regexify('[0-9]{11}'),
        'rg' => $faker->randomNumber(8),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {

    return [
        'description' => $faker->text(),
        'size' => $faker->numberBetween(1, 50),
        'price' => $faker->randomFloat(2, 100, 400),
    ];
});