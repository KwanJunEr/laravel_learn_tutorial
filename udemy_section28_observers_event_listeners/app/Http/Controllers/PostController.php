<?php

namespace App\Http\Controllers;

use App\Events\PostCreateEvent;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Mail\PostCreateEmail;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Using Model Observers
        //
        $post = new Post();
        $post->title = 'Test Title';
        $post->description = 'Test Description';
        $post->save();

        
        // dd($post);

        //Using Event and Listener 
        event(new PostCreateEvent("josephjotaro099@gmail.com"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
