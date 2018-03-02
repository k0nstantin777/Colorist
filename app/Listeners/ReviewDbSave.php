<?php

namespace App\Listeners;

use App\Events\ReviewCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Review;

class ReviewDbSave
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
        return Review::create([
                    'author' => $event->inputData['review-name'],
                    'text' => $event->inputData['review-text'],

               ]);
    }
}
