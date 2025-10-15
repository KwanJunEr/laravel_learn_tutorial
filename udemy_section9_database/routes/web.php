<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleActionController;
use App\Models\Blog;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class,'showAboutPage']);

Route::get('/single-action', SingleActionController::class);

//Blog
//Create
//Update
//Read
//Delete



// Route::resource('/blog', BlogController::class);

Route::get('/blog', function(){
    $blogs = Blog::all();  //SELECT * FROM blogs
    dd($blogs);
});