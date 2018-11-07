<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    /**
     * Show the blog home page.
     */
    public function index()
    {
        $pagination = config('blogged.settings.pagination');

        $articles = Article::paginate($pagination);

        return ArticleResource::collection($articles);
    }
}