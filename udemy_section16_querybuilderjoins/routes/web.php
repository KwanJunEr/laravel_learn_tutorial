<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/join', function(){

    //Inner Join 
    // $usersWithOrders = DB::table('users')
    //     ->join('orders', 'users.id', '=', 'orders.user_id')
    //     // ->select('users.name', 'orders.product_name')
    //     ->select('users.*', 'orders.product_name')
    //     ->get();

    //Left Join 
    // $usersWithOrders = DB::table('users')
    //     ->leftJoin('orders', 'users.id', '=','orders.user_id')
    //     ->select('users.name', 'orders.product_name')
    //     ->get();

    //Right Join 
    // $usersWithOrders = DB::table('users')
    //     ->rightJoin('orders', 'users.id', '=', 'orders.user_id')
    //     ->select('orders.product_name', 'users.name')
    //     ->get();

    //Full Outer Join 
    // $fullOuterJoin = DB::table('users')
    //     ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
    //     ->select('users.name', 'orders.product_name')
    //     ->unionAll(
    //         DB::table('users')
    //         ->rightJoin('orders', 'users.id', '=', 'orders.user_id')
    //         ->select('users.name', 'orders.product_name')
    //     )->get();

    //Full Outer Join with Duplicates Removed
     $fullOuterJoin = DB::table('users')
        ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.name', 'orders.product_name')
        ->union(
            DB::table('users')
            ->rightJoin('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.name', 'orders.product_name')
        )->get();


    dd($fullOuterJoin);
});

