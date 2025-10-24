<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/post', [PostController::class, 'index'])->name('post.index');
// Route::post('/post', [PostController::class, 'handlePost'])->name('post.store')->middleware(CheckRoleMiddleware::class);


//Route Group
// Route::group(['middleware' => CheckRoleMiddleware::class], function(){
//     Route::get('/post', [PostController::class, 'index'])->name('post.index');
//     Route::post('/post', [PostController::class, 'handlePost'])->name('post.store');

// });


// Route::get('/post', [PostController::class, 'index'])->name('post.index')->middleware('test-group');
// Route::post('/post', [PostController::class, 'handlePost'])->name('post.store')->middleware('checkRole');
// Route::get('/post', [PostController::class, 'index'])->name('post.index');


Route::get('user/dashboard', function(){
    dd('User Dashboard');
})->middleware('checkRole:user');

Route::get('admin/dashboard', function(){
    dd('Admin Dashboard');
})->middleware('checkRole:admin');