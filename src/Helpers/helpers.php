<?php

if (! function_exists('blogged_assets')) 
{
    function blogged_assets($path, $secure = null)
    {
        return asset('vendor/binarytorch/blogged/assets/' . $path, $secure);
    }
}
