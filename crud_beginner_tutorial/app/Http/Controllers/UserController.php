<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword'=> 'required'
        ]);
        if(Auth::attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])){
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    public function logout(Request $request){
        Auth::logout();
          // Invalidate the session
        $request->session()->invalidate();

          // Regenerate CSRF token to prevent session fixation
        $request->session()->regenerateToken();
        return redirect('/');
    }
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
