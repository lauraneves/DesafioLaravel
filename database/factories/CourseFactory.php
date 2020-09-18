<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'description' => $faker->text($maxNbChars = 200),
        'category_id' => '1',
        'slug' => 'name',
        'img' => $faker-> imageUrl($width = 640, $height = 480),
        'video' => 'https://www.youtube.com/embed/yahJT8OjlLg',
    ];
});