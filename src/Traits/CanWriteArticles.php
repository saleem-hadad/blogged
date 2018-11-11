<?php

namespace BinaryTorch\Blogged\Traits;

use BinaryTorch\Blogged\Models\Article;

trait CanWriteArticles
{
    /**
     * @return hasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }
}