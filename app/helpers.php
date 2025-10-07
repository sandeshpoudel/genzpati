<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('article_image_url')) {
    function article_image_url($path)
    {
        if (!$path) {
            return asset('images/default-article.jpg');
        }

        // If path already starts with "articles/", don't prepend again
        if (Str::startsWith($path, 'articles/')) {
            if (Storage::disk('public')->exists($path)) {
                return asset('storage/' . $path);
            }
        }

        // If only filename stored
        if (Storage::disk('public')->exists('articles/' . $path)) {
            return asset('storage/articles/' . $path);
        }

        // Fallback
        return asset('images/default-article.jpg');
    }
}
