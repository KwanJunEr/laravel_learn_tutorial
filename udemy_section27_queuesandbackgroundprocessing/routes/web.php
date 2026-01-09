<?php

use App\Models\User;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});


Route::get('/send', function(){
    $user = User::find(13);
    dispatch(new SendWelcomeEmail($user));

    dd('Email Sent');
});

require __DIR__.'/settings.php';
