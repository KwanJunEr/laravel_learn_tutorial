<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleActionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class,'showAboutPage']);

Route::get('/single-action', SingleActionController::class);

//Blog
//Create
//Update
//Read
//Delete

// Route::post('/blog/create', [BlogController::class, 'create'])->name('blog.create');
// Route::get('/blog/showw', [BlogController::class, 'show'])->name('blog.show');
// Route::post('/blog/create', [BlogController::class, 'create'])->name('blog.create');
// Route::post('/blog/create', [BlogController::class, 'create'])->name('blog.create');

Route::resource('/blog', BlogController::class);