<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Http\Resources\ArticleResource;
use BinaryTorch\Blogged\Http\Requests\CreateArticleFormRequest;

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

    /**
     * Create new blog article.
     */
    public function store(CreateArticleFormRequest $request)
    {
        Article::authorizeToCreate($request);
        
        return response()->json([], 201);
    }
}