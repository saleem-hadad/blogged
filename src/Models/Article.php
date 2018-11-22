<?php

namespace BinaryTorch\Blogged\Models;

use Mews\Purifier\Facades\Purifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use BinaryTorch\Blogged\Filters\Filterable;
use BinaryTorch\Blogged\Traits\Authorizable;
use BinaryTorch\Blogged\Contracts\BloggedUser;
use BinaryTorch\Blogged\Traits\HasMarkdownParser;

class Article extends Model
{
    use Filterable, 
        Authorizable,
        HasMarkdownParser;

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
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        $query->where('published', true);
    }

    /**
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured(Builder $query)
    {
        $query->where('featured', true);
    }

    /**
     * @return String
     */
    public function getParsedBodyAttribute()
    {
        return Purifier::clean($this->parse($this->body), [
            'AutoFormat.AutoParagraph' => false,
            'AutoFormat.RemoveEmpty'   => false,
        ]);
    }

    /**
     * @return String
     */
    public function getImageAttribute($value)
    {
        return \Storage::disk(config('blogged.settings.storage'))->url($value);
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
     * author
     *
     * @return string
     */
    public function authorAvatar()
    {
        if ($this->author instanceof BloggedUser) {
            return $this->author->avatar;
        }

        return 'https://secure.gravatar.com/avatar/' . md5(strtolower(trim($this->author->email))) . '?s=80';
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

    /**
     * @return void
     */
    public function updateImage($path)
    {
        $this->image = $path;

        $this->deleteImageFromStorage();
    }

    /**
     * @return void
     */
    public function deleteImageFromStorage()
    {
        if(\Storage::disk(config('blogged.settings.storage'))->exists($this->getOriginal('image'))) {
            \Storage::disk(config('blogged.settings.storage'))->delete($this->getOriginal('image'));
        }
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $item->deleteImageFromStorage();
        });
    }
}