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

        return response()->json([
            'url'  => $url,
            'path' => $path
        ]);
    }

    /**
     * remove unwanted image.
     *
     * @return response
     */
    public function destroy(Request $request)
    {
        $request->validate(['path' => 'required|string']);

        $this->authorizeDeleteImage($request->path);

        if(\Storage::disk(config('blogged.settings.storage'))->exists($request->path)) {
            \Storage::disk(config('blogged.settings.storage'))->delete($request->path);
        }

        return response()->json([], 204);
    }

    /**
     * Check if the user can delete an image. A user can delete image only
     * if it's not associated with an article. 
     *
     * @return void
     */
    protected function authorizeDeleteImage($path)
    {
        $article = Article::where('image', $path)->first();

        abort_if($article, 403);
    }
}