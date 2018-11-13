<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use Illuminate\Http\Request;
use BinaryTorch\Blogged\Models\Article;

class ImageController extends Controller
{
    /**
     * store new image.
     *
     * @return response
     */
    public function store(Request $request)
    {
        $request->validate(['image' => 'required|image']);

        $path = $request->file('image')->store('/public/blogged/images', config('blogged.settings.storage'));

        $path = str_replace('public/', 'storage/', $path);

        return response()->json(['url' => "/{$path}"]);
    }
}