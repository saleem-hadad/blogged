<?php

use BinaryTorch\Blogged\Models\Article;

$factory->define(Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'body'  => $faker->text,
    ];
});