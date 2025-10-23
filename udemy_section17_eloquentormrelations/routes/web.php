<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/relation',function(){
    $users = User::all();
    $address = Address::all();
    return view('test', compact('users', 'address'));
});


Route::get('/users',function(){
    $users = User::all();
    $address = Address::all();
    return view('test', compact('users'));
});



Route::get('/posts', function(){
    // Tag::insert([
    //     [
    //         'name' => 'PHP'
    //     ],
    //     [
    //         'name' => 'Javascript'
    //     ],
    //     [
    //         'name' => 'Laravel'
    //     ],
    // ]);
    // $post = Post::first();
    // $tag = Tag::first();
    // $post->tags()->attach($tag);
    // $post->tags()->attach([2,3]);

    // $post->tags()->detach([2]);
    $posts = Post::all();
    return view('post', compact('posts'));
});

Route::get('tags', function(){
    $tags = Tag::all();
    return view('tag', compact('tags'));
});