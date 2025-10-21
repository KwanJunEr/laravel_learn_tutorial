<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    
    function index(){

        return view('welcome');
    }

    function showAboutPage(){
        return view('about');
    }

}
