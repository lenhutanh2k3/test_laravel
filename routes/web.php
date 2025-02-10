<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
Route::get('post', [PostController::class, 'index'])->name('post.index');   // Hiển thị danh sách bài viết
Route::get('post/create', [PostController::class, 'create'])->name('post.create'); // Trang form tạo bài viết
Route::post('post/insert', [PostController::class, 'store'])->name('post.store');
Route::delete('post/delete/{id}',[PostController::class,'destroy'])->name('post.delete'); 
Route::get('post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::patch('post/update/{id}',[PostController::class,'update'])->name('post.update');

// products
Route::resource('/products',ProductController::class);