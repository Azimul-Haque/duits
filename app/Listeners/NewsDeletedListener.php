<?php

namespace App\Listeners;

use App\Events\NewsDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsDeletedListener
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
     * @param  NewsDeleted  $event
     * @return void
     */
    public function handle(NewsDeleted $event)
    {
        //
    }
}
