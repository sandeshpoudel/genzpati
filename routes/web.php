<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AboutController, ContactController, CategoryController, PublicController, ArticleController, DailyQuestionController};

//public routes
Route::get('/', [PublicController::class,'index'])->name('home');
Route::get('/article/{slug}', [PublicController::class, 'show'])->name('public.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// Daily questions route
Route::get('/daily-questions', [DailyQuestionController::class, 'index'])->name('daily-questions.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('articles', ArticleController::class);
    // this route for toggle publish/unpublish
    Route::patch('/articles/{article}/toggle-status', [ArticleController::class, 'toggleStatus'])->name('articles.toggleStatus');
});

require __DIR__.'/auth.php';
