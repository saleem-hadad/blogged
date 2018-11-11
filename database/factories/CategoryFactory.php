<?php

use BinaryTorch\Blogged\Models\Category;

$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug'  => $faker->unique()->slug(),
    ];
});