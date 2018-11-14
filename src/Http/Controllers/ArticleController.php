<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use Illuminate\Support\Facades\DB;
use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Jobs\CreateNewArticle;
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

        $articles = Article::orderBy('created_at', 'DESC')
            ->orderBy('publish_date', 'DESC')
            ->paginate($pagination);

        return ArticleResource::collection($articles)
            ->additional(['statistics' => [
                'total'     => $articles->total(),
                'published' => Article::published()->count(),
                'featured'  => Article::featured()->count(),
            ]]);
    }

    /**
     * Create new blog article.
     */
    public function store(CreateArticleFormRequest $request)
    {
        Article::authorizeToCreate($request);

        CreateNewArticle::dispatch();
        
        return response()->json([], 201);
    }
}
