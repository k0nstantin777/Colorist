<?php

namespace App\Listeners;

use App\Events\ReviewCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ReviewMail;
use Illuminate\Support\Facades\Mail;

class ReviewMailNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ReviewCreated  $event
     * @return void
     */
    public function handle(ReviewCreated $event)
    {
        Mail::to(settings('MAIL_TO'))
            ->send(new ReviewMail($event->inputData));
    }
}
