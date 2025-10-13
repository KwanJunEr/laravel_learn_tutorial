<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    if (Auth::check()) {
        // Logged-in user: get only their posts
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    } else {
        // Guest: get all posts
        $posts = Post::latest()->get();
    }
    //$posts = Post::where('user_id', Auth::id())->get(); -> This is to get all 
    return view('home',['posts'=> $posts]); //pass the posts as array of data
});

Route::post('/register',[UserController::class, 'register']);
Route::post('/logout',[UserController::class,'logout']);
Route::post('/login',[UserController::class, "login"]);
Route::post('/create-post',[PostController::class,"createPost"]);
Route::get('/edit-post/{post}',[PostController::class,'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class,'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);