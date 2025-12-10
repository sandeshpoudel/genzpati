<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ArticleRepositoryContract;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class PublicController extends Controller
{
    public function __construct(
       protected ArticleRepositoryContract $article
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $categories = Category::all();
//
//        $featured = Article::where("status", 'published')
//        ->latest()
//        ->take(3)
//        ->get();
//
//        $articles = Article::where('status', 'published')
//        ->latest()
//        ->skip(3)
//        ->paginate(9);

        // you should skip first three items in here on view file
        $articles = $this->article->findAll()->paginate(9);
        $featured = $articles->take(3);

        return view('home', compact('articles', 'featured'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
//        What the fuck man!!!
//        $article = Article::where('slug', $slug)->firstOrFail();
//        $categories = Category::all();
//        $relatedArticles = Article::where('category_id', $article->category_id)
//            ->where('id', '!=', $article->id)
//            ->latest()
//            ->take(3)
//            ->get();
//
//        return view('public.singlearticle', compact('article', 'categories','relatedArticles'));


//        this is how its done
        $article = $this->article->find($slug);
        return view('public.singlearticle', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
