<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    
    function index(){
        
        //Used for insertion of values into the database with query builder 
    //     DB::table('users')->insert([[
    //     'name' => 'Artik',
    //     'email' => 'artik@gmail.com',
    //     'password' => '1234'
    // ],[
    //     'name' => 'Jhohan',
    //     'email' => 'johan@gmail.com',
    //     'password' => '1234'
    // ]]);

    //Get data from the table 
    //$users= DB::table('users')->get()->where('id', 3)->first();
    //$users = DB::table('users')->where('email', 'jhon@gmail.com')->where('id',1)->first();

    //operations 
    //$users = DB::table('users')->where('id', '>', 2)->get();

    // $users = DB::table('users')->where('email', '=', 'jhon@gmail.com')->first();  //first() mean to get the first record 
    // return $users;

        //To Update the Data 
        // DB::table('users')->where('id', 1)->update([
        //     'name' => 'test user',
        //     'email' => 'test@gmail.com'
        // ]);

        //To delete data
        // DB::table('users')->where('id', 3)->delete();

        //To get a list of column values 
        //$blogs = DB::table('blogs')->select('title')->get();

        //Retrieving a list of column values 
        //$blogs = DB::table('blogs')->pluck('title','id')->toArray();
        //dd($blogs);  //Dump and die which prints out the contents of the variable in a readable format like var_dump, but prettier then stops all further code execution right after 
        
       // $products = DB::table('products')->get()->count();
       //$products = DB::table('products')->max('price');
      // $products = DB::table('products')->min('price');
      //$products = DB::table('products')->sum('price');
      $products = DB::table('products')->avg('price');
        dd($products);
        //return view('welcome');
    }

    function showAboutPage(){
        return view('about');
    }

}
