<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notice;
use App\Subject;
use App\Grade;
use Faker\Generator as Faker;

$factory->define(Notice::class, function (Faker $faker) {



    return [
        //
        'user_id' => factory('App\User'),
        'title' => $faker->sentence,
        'post_image'=> $faker->imageUrl('900', '300'),
        'body' => $faker->paragraph,
        'publish'=> 'Yes'
    ];
});

$factory->define(Subject::class, function (Faker $faker) {

    $name = $faker->word;
    $slug = strtolower($name);

    return [
        //
        'subject_title' => $name,
        'subject_slug' => $slug,
        'publish'=> $faker->randomElement(['Yes' ,'No']),
        'isActive'=> 'Yes',
        'isDelete'=> 'No',
        
    ];
});

$factory->define(Grade::class, function (Faker $faker) {

    $name = $faker->word;
    $slug = strtolower($name);

    return [
        //
        'grade_title' => $name,
        'grade_slug' => $slug,
        'publish'=> $faker->randomElement(['Yes' ,'No']),
        'isActive'=> 'Yes',
        'isDelete'=> 'No',
        
    ];
});
