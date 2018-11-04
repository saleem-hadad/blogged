<?php

use BinaryTorch\Blogged\Models\Article;

$factory->define(Article::class, function (Faker\Generator $faker) {
    return [
        'title'        => $faker->sentence,
        'slug'         => $faker->unique()->slug(),
        'image'        => $faker->randomElement([
            'https://s3-ap-southeast-1.amazonaws.com/myseniorio/larecipe.png',
            'https://s3-ap-southeast-1.amazonaws.com/myseniorio/zino.png',
            'https://s3-ap-southeast-1.amazonaws.com/myseniorio/blogged.png',
        ]),
        'body'         => $faker->text,
        'publish_date' => $faker->dateTime,
        'published'    => false,
        'featured'     => false,
    ];
});