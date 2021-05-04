<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
        // 'password' => '$10$romaJhsNBax/0C6sOQ74w.x5BAM2xDR62Ulc8RDPU.ZAVMmWN0LjG', // password
        'remember_token' => Str::random(10),

    ];
});

$factory->define(Role::class, function (Faker $faker) {

    $name = $faker->randomElement(['Admin' ,'Student','Teacher']);
    $slug = strtolower($name);

    return [
        'name' =>  $name,
        'slug' => $slug,
        // 'created_at'=>$this->faker->dateTimeBetween("-1 day" , now()),


    ];
});


