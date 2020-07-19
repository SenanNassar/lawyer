<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consultative;
use Faker\Generator as Faker;

$factory->define(Consultative::class, function (Faker $faker) {  

    return [
    

        //

        'title' => $faker->jobTitle,
        'body' => $faker->paragraph( 3, true),
        'email' => $faker->email,
        'phone_number' => $faker->tollFreePhoneNumber,
        'name' => $faker->name()
    ];
});
