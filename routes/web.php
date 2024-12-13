<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');   // Show all posts
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');   // Create a post form
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');   // Store new post
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');   // Edit a post form
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');   // Update a post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');   // Delete a post
});

require __DIR__.'/auth.php';  // Auth routes
