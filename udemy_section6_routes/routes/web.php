<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


//Route Grouping

Route::group([], function(){
    //named routes
    Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

    Route::get('/user/{id}/{slug}', function($id, $slug){
    return "Hello User" . $id . $slug;
})->name('user');

//named routes 
Route::get('/abouting', function(){
    return "This is an about page";
})->name('my.abouting');  //Serve as an alias
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/about', function(){
    return "This is a Home page";
});

//Route Parameters with curly braces so is dynamic

Route::get('/user/{id}', function($id){
    return "Hello User" . $id;    //. means concating  //and also auto detects
});

//Another Route Grouping 
Route::group(['prefix'=> 'blog', 'as' => 'blog.'], function(){
    Route::get('/create', function(){
        return "Blog Create Page";
    })->name('create');
      Route::get('/edit', function(){
        return "Blog Edit Page";
    })->name('edit');
      Route::get('/update', function(){
        return "Blog Update Page";
    })->name('show');
});

Route::get('get-route', function(){
    return;
});

Route::post('post-route', function(){
    return;
});

Route::put('put-route', function(){
    return;
});
Route::patch('patch-route', function(){
    return;
});
Route::delete('delete-route', function(){
    return;
});

Route::fallback(function(){
    return "Oops we cannot find this page";
});

//fallbackk routes

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
