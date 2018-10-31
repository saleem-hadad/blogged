<?php

namespace BinaryTorch\Blogged\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['publish_date'];

    /**
     * @var array
     */
    protected $casts = [
        'published' => 'boolean',
        'featured'  => 'boolean'
    ];

    /**
     * @var void
     */
    public function publish()
    {
        $this->published = true;

        if (! $this->publish_date) {
            $this->publish_date = now();
        }

        $this->save();
    }

    /**
     * @var void
     */
    public function feature()
    {
        $this->update(['featured' => true]);
    }

    /**
     * @var Illuminate\Database\Eloquent\Builder
     */
    public function scopeScheduled(Builder $query)
    {
        $query->where('published', false)
            ->whereNotNull('publish_date');
    }
}