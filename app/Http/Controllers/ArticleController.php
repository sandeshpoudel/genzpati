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
   public function index(Request $request)
{
    $status = $request->query('status', null);

    // Start query
    $query = Article::query();

    // Role-based filtering
    $user = auth()->user();

    if ($user->role === 'reporter') {
        // Reporter sees only their own articles
        $query->where('user_id', $user->id);
    } elseif (in_array($user->role, ['user', 'subscriber'])) {
        // Regular users/subscribers see only published articles
        $query->where('status', 'published');
    }
    // Admins and Editors can see all articles

    // Apply status filter if selected (for everyone)
    if ($status) {
        $query->where('status', $status);
    }

    // Latest created articles first
    $articles = $query->orderBy('created_at', 'desc')
                      ->paginate(10)
                      ->withQueryString();

    return view('article.index', compact('articles', 'status'));
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
        // dd($request->all());
        $validated = $request->validated();
        
        // Handle file upload if exists
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('articles', 'public'); // stores in storage/app/public/articles
            $validated['featured_image'] = $path;
        }
        // Generate unique slug
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

        // Set published_at if status is published
        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }
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

            // Handle file upload if exists
if ($request->hasFile('featured_image')) {
    // Delete old image if exists
    if ($article->featured_image && \Storage::disk('public')->exists($article->featured_image)) {
        \Storage::disk('public')->delete($article->featured_image);
    }

    $image = $request->file('featured_image');
    $path = $image->store('articles', 'public');
    $validated['featured_image'] = $path;
}


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

    public function toggleStatus(Article $article)
{
    if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
        abort(403, 'Unauthorized action.');
    }

    if ($article->status === 'published') {
        $article->status = 'draft';
        $article->published_at = null;
    } else {
        $article->status = 'published';
        $article->published_at = now();
    }

    $article->save();

    return redirect()->back()->with('success', 'Article status updated successfully!');
}

}
