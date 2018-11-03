<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use BinaryTorch\Blogged\Models\Article;

class ArticleController extends Controller
{
    /**
     * Show the blog home page.
     */
    public function index()
    {
        $articles = Article::paginate(10);

        return view('blogged::blog.index', compact('articles'));
    }

    /**
     * Show a given article.
     */
    public function show(Article $article)
    {
        return view('blogged::blog.show', compact('article'));
    }
}