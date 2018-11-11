<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use BinaryTorch\Blogged\Models\Article;

class BlogController extends Controller
{
    /**
     * Show the blog home page.
     */
    public function index()
    {
        $pagination = config('blogged.settings.pagination');

        $articles = Article::paginate($pagination);

        return view('blogged::blog.index', compact('articles'));
    }

    /**
     * Show a given article.
     */
    public function show(Article $article)
    {
        $article->load('author');

        return view('blogged::blog.show', compact('article'));
    }
}