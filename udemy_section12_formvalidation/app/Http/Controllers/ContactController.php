<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;

class ContactController extends Controller
{
    //
    function index(){
        return view('contact');
    }

    //Method 1 to create contactSubmit without the usage of custom classes 
    // function contactSubmit(Request $request){
      
    //     //dd($request->all());  // to basically view only the data 
    //     // echo $request->name;
    //     // echo $request->email;

    //     //dd(request());

    //     //To get the name of the input from request
    //     // echo $request->input('name');

    //     //To validate the request data 
    //     $request->validate([
    //         // 'name' => 'required|max:20|min:2',
    //         'name' => ['required', 'max:20', 'min:2'],
    //         'email' => 'required|email'
    //     ],
    //     //adding custom validation message
    //     [
    //         'name.required' => 'Hey please fill the name field',
    //         'name.max'=> 'the max length of name have to be 20',
    //         'name.min' => 'the min length of name have to be 2',
    //         'email.required' => 'Hey email is required'
    //     ]);
    // }

    function contactSubmit(ContactStoreRequest $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        dd("saved");
    }
}
