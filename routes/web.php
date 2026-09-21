<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/@{username}/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');
  

Route::get('/', [PostController::class,'index'])
->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('post', PostController::class);

Route::get('/{username}/posts/{post}', [PostController::class, 'show'])
    ->name('post.show');

Route::get('/post/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');

Route::get('/post/create', [PostController::class, 'create'])
    ->name('post.create');
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('post.destroy');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::post('/post/create', [PostController::class, 'store'])
    ->name('post.store');
    
Route::delete('/post/{post}', [PostController::class, 'destroy'])
    ->name('post.destroy')
    ->middleware('auth');

Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post:slug}', [PostController::class, 'update'])->name('post.update');
Route::patch('/profile', [ProfileController::class, 'update']);
Route::post('/post/{post}/clap', [PostController::class, 'clap'])
    ->name('post.clap')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/category/{category}', [PostController::class, 'category'])->name('post.byCategory');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
