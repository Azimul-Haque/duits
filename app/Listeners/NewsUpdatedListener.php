<?php

namespace App\Listeners;

use App\Events\NewsUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsUpdatedListener
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
     * @param  NewsUpdated  $event
     * @return void
     */
    public function handle(NewsUpdated $event)
    {
        //
    }
}
