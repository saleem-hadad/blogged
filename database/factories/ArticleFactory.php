<?php

use BinaryTorch\Blogged\Models\Article;

$factory->define(Article::class, function (Faker\Generator $faker) {
    return [
        'title'        => $faker->title,
        'slug'         => $faker->unique()->slug(),
        'image'        => $faker->randomElement([
            'https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2016/10/docker.png?resize=2200%2C1125',
            'https://i2.wp.com/wp.laravel-news.com/wp-content/uploads/2018/10/larametrics.png?resize=2200%2C1125',
        ]),
        'body'         => $faker->text,
        'publish_date' => $faker->dateTime,
        'published'    => false,
        'featured'     => false,
    ];
});