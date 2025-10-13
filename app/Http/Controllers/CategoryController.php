<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
        'description' => 'nullable|string',
    ]);

    Category::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'description' => $request->description,
    ]);

    return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // for public display of articles under this category
        $categories = Category::all();

        $categoryForDisplay = Category::where('slug', $slug)->firstOrFail();

        // Get articles of this category
        $articles = Article::where('category_id', $categoryForDisplay->id)
            ->latest()
            ->paginate(9); // paginate for grid layout

        return view('public.singleCategory', compact('categories', 'articles', 'categoryForDisplay'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        'description' => 'nullable|string',
    ]);

    $category->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
