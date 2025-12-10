<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Article;

interface ArticleRepositoryContract {
    public function findAll();
    public function find($slug): Article;
//    public function create(array $data): Article;
//    public function update(Article $article, array $data): Article;
}
