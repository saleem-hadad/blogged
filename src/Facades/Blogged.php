<?php

namespace BinaryTorch\Blogged\Facades;

use Illuminate\Support\Facades\Facade;

class Blogged extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Blogged';
    }
}