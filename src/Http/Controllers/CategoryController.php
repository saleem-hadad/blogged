<?php

namespace BinaryTorch\Blogged\Http\Controllers;

use Illuminate\Http\Request;
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
        $categories = Category::withCount('articles as articlesCount')->get(['id', 'title', 'slug']);
        
        return response()->json(['data' => $categories]);
    }

    /**
     * index
     *
     * @return void
     */
    public function store(Request $request)
    {
        Category::authorizeToCreate($request);

        $request->validate([
            'title' => 'required|string|max:100', 
            'slug'  => 'required|string|unique:blogged_categories,slug|max:120'
        ]);

        $category = Category::create([
            'title' => $request->title,
            'slug'  => $request->slug,
        ]);

        return response()->json(['data' => $category], 201);
    }

    /**
     * index
     *
     * @return void
     */
    public function update(Category $category, Request $request)
    {
        $category->authorizeToUpdate($request);

        $request->validate([
            'title' => 'required|string|max:100', 
            'slug'  => 'required|string|unique:blogged_categories,slug|max:120'
        ]);

        $category->update([
            'title' => $request->title,
            'slug'  => $request->slug,
        ]);

        return response()->json(['data' => $category], 204);
    }

    /**
     * index
     *
     * @return void
     */
    public function destroy(Category $category, Request $request)
    {
        $category->authorizeToDelete($request);

        $category->delete();

        return response()->json([], 204);
    }
}