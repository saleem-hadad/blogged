<?php

namespace BinaryTorch\Blogged\Filters;

trait Filterable
{
    /**
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  Filters $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, Filters $filters)
    {
        return $filters->apply($query);
    }
}