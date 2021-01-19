<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', 'posts');

Route::prefix('posts')->group(function () {
    Route::get('create', [PostController::class, 'edit'])->name('posts.create');
    Route::put('/', [PostController::class, 'update'])->name('posts.store');
});

Route::prefix('posts/{category:slug?}')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('{post:slug?}', [PostController::class, 'show'])->name('posts.show');
    Route::get('{post:slug?}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('{post:slug?}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('{post:slug?}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::resource('categories', CategoryController::class)->scoped([
    'category' => 'slug',
]);;
