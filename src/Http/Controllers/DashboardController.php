<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use BinaryTorch\Blogged\Models\Article;

class DashboardController extends Controller
{
    /**
     * Show the blog dashboard page.
     */
    public function index()
    {
        $articles = Article::paginate(10);

        return view('blogged::dashboard.index', compact('articles'));
    }
}