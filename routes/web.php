<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});
// Users
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
// Posts
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');
Route::delete('/posts/delete', [PostsController::class, 'destroy'])->name('posts.destroy');
// Comments
Route::get('/comments', [CommentsController::class, 'index'])->name('comments.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
