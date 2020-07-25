<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'job_title' => $faker->jobTitle,
        'cv' => $faker->text(50),
        'linkedin' => $faker->url,
        'picture' => $faker->text(50)

    
    ];
});
