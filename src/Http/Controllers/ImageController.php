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

        $url = \Storage::disk(config('blogged.settings.storage'))->url($path);

        if(config('blogged.settings.storage') === 'local') {
            $path = str_replace('/public', '', $path);
        }

        return response()->json([
            'url'  => $url,
            'path' => "/{$path}"
        ]);
    }
}