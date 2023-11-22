<?php

use App\Http\Controllers\Posts;
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

Route::get('/posts', [Posts::class, 'index'])->name('posts.index');
Route::get('/posts/create', [Posts::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [Posts::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{id}/destroy', [Posts::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/store', [Posts::class, 'store'])->name('posts.store');
Route::put('/posts/{id}/update', [Posts::class, 'update'])->name('posts.update');
