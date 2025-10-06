<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('status', 'published')
            ->orderBy('published_at')->latest()
            ->paginate(10);

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $slug = \Str::slug($validated['title']);
        // Ensure slug is unique
        $originalSlug = $slug;
        $count = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $validated['slug'] = $slug;


        $validated['user_id'] = auth()->id();

        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $article = Article::where('id', $id)->firstOrFail();
        return view('article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);

        // Authorization: only owner or admin
        if (auth()->user()->id !== $article->user_id && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,pending,published',
            'published_at' => 'nullable|date',
        ]);

        // If title has changed, update slug
        if ($validated['title'] !== $article->title) {
            $slug = \Str::slug($validated['title']);
            $originalSlug = $slug;
            $count = 1;

            while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $validated['slug'] = $slug;
        }

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        // Authorization: only owner or admin
        if (auth()->user()->id !== $article->user_id && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
    }
    $article->delete();
    return redirect()->route('articles.index')->with('success', 'Article Deleted successfully!');
}
}
