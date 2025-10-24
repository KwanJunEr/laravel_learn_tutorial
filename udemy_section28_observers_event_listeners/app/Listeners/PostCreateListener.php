<?php

namespace App\Listeners;

use App\Mail\PostCreateEmail;
use App\Events\PostCreateEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreateEvent $event): void
    {
        //
        // dd($event->name);
        // dd("Hello World");

        // dd("Call from LISTENER" . ' ' . $event->name );
        Mail::to($event->email)->send(new PostCreateEmail());
    
    }
}
