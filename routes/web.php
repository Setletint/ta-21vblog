<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/feed', [PublicController::class, 'feed'])->name('feed');
Route::get('/post/{post}', [PublicController::class, 'post'])->name('post');

Route::get('/user/{user}', [PublicController::class, 'user'])->name('user');



// Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::middleware('auth')->group(function () {
    Route::resource('/admin/posts', PostController::class);

    Route::post('/post/{post}', [PublicController::class, 'comment'])->name('comment');
    Route::get('/post/{post}/like', [PublicController::class, 'like'])->name('like');

    Route::get('/user/{user}/follow', [PublicController::class, 'follow'])->name('follow');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [PasswordController::class, 'update'])->name('newPassword.update');
});

require __DIR__ . '/auth.php';
