<?php

use App\Http\Controllers\ThirdPartyAuth\ThirdPartyAuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\Post\Like\LikeController;
use App\Http\Controllers\Web\Post\PostController;
use App\Http\Controllers\Web\User\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/{post}/likes', [LikeController::class, 'index'])->name('posts.likes.index');
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

Route::get('/users/{user:username}', [UserController::class, 'index'])->name('users.index');

Route::prefix('/oauth')->group(function () {
    Route::get('/{driver}', [ThirdPartyAuthenticationController::class, 'redirect']);
    Route::get('/{driver}/callback', [ThirdPartyAuthenticationController::class, 'handle']);
});
Route::get('/users/{user:username}', [UserController::class, 'index'])->name('users.index');
