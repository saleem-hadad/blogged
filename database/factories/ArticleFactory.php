<?php

use BinaryTorch\Blogged\Models\Article;

$factory->define(Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'slug'  => $faker->slug(),
        'body'  => $faker->text,
    ];
});