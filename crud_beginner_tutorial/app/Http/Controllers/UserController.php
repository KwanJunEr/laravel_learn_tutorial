<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate input
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users','name')],
            'email' => ['required', 'email', Rule::unique('users','email')], // prevent duplicate emails
            'password' => ['required', 'min:8', 'max:200']
        ]);

        // Hash the password before saving
        $incomingFields['password'] = Hash::make($incomingFields['password']);

        // Create user
        $user = User::create($incomingFields);
        Auth::login($user);
        return redirect('/');

        // Return confirmation with user ID
       
    }
}
