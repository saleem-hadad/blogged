<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use BinaryTorch\Blogged\Models\Category;

class CategoryController extends Controller
{
    /**
     * index
     *
     * @return response
     */
    public function index()
    {
        $categories = Category::get(['title', 'slug']);
        
        return response()->json(['data' => $categories]);
    }

    /**
     * index
     *
     * @return void
     */
    public function store()
    {
        //
    }

    /**
     * index
     *
     * @return void
     */
    public function update()
    {
        //
    }

    /**
     * index
     *
     * @return void
     */
    public function delete()
    {
        //
    }
}