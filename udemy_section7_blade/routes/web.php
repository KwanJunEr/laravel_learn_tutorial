<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/contact2', function(){
    return view('contact.index');
});

//passing values 

Route::get('/contact3', function(){
    $title = "Contact Page!";
    $description = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident rem eligendi quidem, ad asperiores nemo!";
    $books = ['Deep work', "Steal like a artist", "Story Brand"];
    return view('contact.index', ['title'=>$title , 'description' => $description, 'books' => $books]);
});


Route::get('/about', function(){
    return view ('about');
});