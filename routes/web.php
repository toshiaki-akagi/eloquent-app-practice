<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

// 投稿の作成・表示・編集・削除を行うためのルーティング
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');             // 投稿一覧画面の表示
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');    // 投稿作成画面の表示
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');            // 投稿を作成
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');     // 投稿編集画面の表示
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');      // 投稿を更新
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy'); // 投稿を削除