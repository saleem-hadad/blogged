<?php

namespace BinaryTorch\Blogged\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use BinaryTorch\Blogged\Traits\HasMarkdownParser;

class Article extends Model
{
    use HasMarkdownParser;

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
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeScheduled(Builder $query)
    {
        $query->where('published', false)
            ->whereNotNull('publish_date');
    }

    /**
     * @return String
     */
    public function getExcerptAttribute()
    {
        return substr($this->body, 0, 75);
    }

    /**
     * @return String
     */
    public function getParsedBodyAttribute()
    {
        return $this->parse($this->body);
    }

    /**
     * @return void
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
     * @return void
     */
    public function feature()
    {
        $this->update(['featured' => true]);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return String
     */
    public function path()
    {
        return config('blogged.routes.blog') . $this->slug;
    }
}