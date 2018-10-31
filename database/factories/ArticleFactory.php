<?php

use BinaryTorch\Blogged\Models\Article;

$factory->define(Article::class, function (Faker\Generator $faker) {
    return [
        'title'        => $faker->title,
        'slug'         => $faker->slug(),
        'image'        => $faker->url,
        'excerpt'      => $faker->text,
        'body'         => $faker->text,
        'publish_date' => $faker->dateTime,
        'published'    => false,
        'featured'     => false,
    ];
});