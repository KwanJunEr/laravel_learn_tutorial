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

        //Create data in db 

        // $user = new User();
        // $user->name = "MayLing";
        // $user->email="mayling@gmail.com";
        // $user->password='12345';
        // $user->save();

        // $product = new  Product();
        // $product->name = 'Car';
        // $product->description = 'This is a test description';
        // $product->price = 100;
        // $product->save();


        //Read data from db 
        //Retrieve all the data 
        // $users= User::all(); //get all the data  
        // foreach($users as $user){
        //    echo $user->name . "---" . $user->email;
        //    echo "<br>";
        // }

        //Read data from db basewd on userId
        // $user = User::where('id',1)->first();
        // $user = User::find(1);
        // dd($user);

        //Updating the Data
        // $user = User::where('id',2)->first();
        // $user->email = "hello@gmail.com";
        // $user->password = "mayling";
        // $user->save();
        // dd($user);

        //Delete the data
        // $user = User::find(4);
        // $user->delete();
       // $user = User::find(4)->delete();

    //    $user= User::findOrFail(4);
    //    $user->delete();

    //Creating user with mass assignment 
    // User::create([
    //     'name'=>'testing user',
    //     'email' => 'testing@gmail.com',
    //     'password' => '12312',
    //     'email_verified_at' => 'hello world',
    // ]);

//     User::insert([[
//         'name' => 'test user 4',
//         'email' => 'testuser4@gmail.com',
//         'password' => '1234'
//     ],[
//         'name' => 'test user 3',
//         'email' => 'testuser3@gmail.com',
//         'password' => '1234'
//     ],
//     ]
// );
        //Conditional 
        //Where clauses 
        // $product = Product::where('id', '>' , 1)->first();

        //Chaining for where clauses for conditional 
        //$product = Product::where('id',1)->where('price',365)->get();

       // $product = Product::where(['id'=> 1, 'price'=> 305])->get();

        //$product = Product::where(['id'=>1])->where('price','>', 303)->get();
        // $product = Product::where('name', 'LIKE', '%Et%')->get();
        //   $product = Product::where('name', 'NOT LIKE', '%Et%')->get();

         //$product = Product::where('name', 'LIKE', '%Et%')->orWhere('description', 'LIKE','%ad%')->get(); //getBothValues

         //$product = Product::whereIn('id',[1,2,3,4,5])->get(); //Fidn all the products where th eid is in th is list of [1,2,3,4,5]
        //  $product = Product::whereBetween('price',[100, 300])->get();  //starting and ending position, find products betwen 100 to 300
        // dd($product);


        //Query Scopes
        // $blogs = Blog::Active()->get();  //call the name of the function only 
        // dd($blogs);

        //Soft Delete 
        //Product::find(1)->delete();
        // $products = Product::all();
        // dd($products);
        //restoring the data
        //$products = Product::withTrashed()->find(1);  //will retrieve back the trashed data
        //$products = Product::withTrashed()->get();  //to get all the data inclding the trashedon
        // $products = Product::onlyTrashed()->get(); //get the trashed data only
        // dd($products);

        //Restore the data 
        //$products = Product::withTrashed()->find(1)->restore();

        //$products = Product::find(1)->delete();

        //truly delete the soft deleteed item 
        $products = Product::withTrashed()->find(1)->forceDelete();
        dd($products);
        return view('welcome');
    }

    function showAboutPage(){
        return view('about');
    }

}
