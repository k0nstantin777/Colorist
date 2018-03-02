<?php

namespace App\Listeners;

use App\Events\FeedbackCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Message;

class FeedbackDbSave
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
     * @param  FeedbackCreated  $event
     * @return void
     */
    public function handle(FeedbackCreated $event)
    {
        return Message::create([
            'name' => $event->inputData['name'],
            'email' => $event->inputData['email'],
            'subject' => $event->inputData['subject'],
            'message' => $event->inputData['message'],
        ]);
    }
}
