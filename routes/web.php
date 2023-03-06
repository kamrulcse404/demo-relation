<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('category');
// });


Route::get('/', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories-create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories-store', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/categories-destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/post-create', [PostController::class, 'create'])->name('post.create');
Route::post('/post-store', [PostController::class, 'store'])->name('post.store');
Route::get('/post-edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post-update/{id}', [PostController::class, 'update'])->name('post.update');