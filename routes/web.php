<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/create', [PostController::class, 'store'])->name('posts.store');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/edit/{id}', [PostController::class, 'update'])->name('posts.update');
