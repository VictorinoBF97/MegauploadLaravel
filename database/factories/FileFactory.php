<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Illuminate\Support\Str;
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

$factory->define(App\Archivo::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'user_id' => random_int(1,3),
        'name' => $name,
        'description' => $faker->text(200)
    ];
});
