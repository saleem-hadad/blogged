<?php

namespace BinaryTorch\Blogged\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use BinaryTorch\Blogged\Traits\Authorizable;
use BinaryTorch\Blogged\Traits\HasMarkdownParser;

class Article extends Model
{
    use HasMarkdownParser, Authorizable;

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blogged_articles';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['category'];

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
     * author
     *
     * @return belongsTo
     */
    public function author()
    {
        return $this->belongsTo(config('blogged.settings.user'), 'author_id');
    }

    /**
     * category
     *
     * @return belongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
        return route('blogged.show', [$this->category->slug, $this->slug]);
    }
}