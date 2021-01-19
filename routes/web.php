<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    Route::get('create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/', [PostController::class, 'store'])->name('posts.store');
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
]);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::post('/login', [UserController::class, 'authenticate'])->name('user.auth');
