<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\FeedbackCreated' => [
            'App\Listeners\FeedbackMailNotify',
            'App\Listeners\FeedbackDbSave',
        ],

        'App\Events\ReviewCreated' => [
            'App\Listeners\ReviewMailNotify',
            'App\Listeners\ReviewDbSave'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
