<?php

use App\Http\Controllers\Brands;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Cars;
use App\Http\Controllers\Tags;
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
Route::delete('/posts/{id}', [Posts::class, 'destroy'])->name('posts.destroy');

Route::post('/posts', [Posts::class, 'store'])->name('posts.store');
Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update');

Route::get('/cars/trash', [Cars::class, 'trash'])->name('cars.trash');
Route::get('/cars/{car}/restore', [Cars::class, 'restore'])->name('cars.restore');
Route::resource('cars', Cars::class);

Route::resource('brands', Brands::class);
Route::resource('tags', Tags::class);