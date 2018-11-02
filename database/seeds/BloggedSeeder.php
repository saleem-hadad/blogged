<?php

use Illuminate\Database\Seeder;
use BinaryTorch\Blogged\Models\Article;

class BloggedSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        factory(Article::class, 6)->create();
    }
}