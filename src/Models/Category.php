<?php

namespace BinaryTorch\Blogged\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use BinaryTorch\Blogged\Traits\Authorizable;

class Category extends Model
{
    use Authorizable;
    
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blogged_categories';

    /**
     * @return hasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
    /**
     * @return String
     */
    public function path()
    {
        return route('blogged.index', $this->slug);
    }
}