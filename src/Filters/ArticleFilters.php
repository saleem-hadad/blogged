<?php

namespace BinaryTorch\Blogged\Filters;

class ArticleFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'search',
    ];

    /**
     * @param $$value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function search($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->where('title', 'LIKE', "%$$value%")
                ->orWhere('slug', 'LIKE', "%$$value%");
        });
    }
}