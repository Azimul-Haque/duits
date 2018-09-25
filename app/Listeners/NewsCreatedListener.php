<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsCreatedListener
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
     * @param  NewsCreated  $event
     * @return void
     */
    public function handle(NewsCreated $event)
    {
        //
    }
}
