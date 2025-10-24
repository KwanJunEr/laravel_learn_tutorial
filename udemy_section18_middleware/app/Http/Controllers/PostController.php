<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller 
// {implements HasMiddleware
    //
{
    // public static function middleware()
    // {
    //     // return [new Middleware(CheckRoleMiddleware::class, only:['store'])];
    //      return [new Middleware(CheckRoleMiddleware::class,except:['index'])];

    //      //only and except method
    // }

    function index(){
        return view('post.index');
    }
    function handlePost(Request $request){
        dd($request->all());
    }
}
