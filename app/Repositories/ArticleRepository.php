<?php

declare(strict_types=1);

namespace App\Repositories;



use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryContract;

class ArticleRepository  implements ArticleRepositoryContract {

    public function findAll()
    {
        return Article::where('status', 'published')
            ->with('category')
            ->latest();
    }
    public function find($slug): Article
    {
       return Article::where('slug', $slug)->with([
            'category',
            'category.article' => function ($query) {
                $query->latest()->take(3);
            },
            'tags'
        ])->firstOrFail();
    }

//    public function create(array $data): Article
//    {
//
//    }
//    public function update(Article $article, array $data): Article
//    {
//
//    }
}
