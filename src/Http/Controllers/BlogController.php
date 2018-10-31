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
        $articles = Article::all();

        return view('blogged::index', compact('articles'));
    }
}