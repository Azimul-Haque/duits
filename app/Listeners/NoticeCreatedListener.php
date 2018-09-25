<?php

namespace App\Listeners;

use App\Events\NoticeCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NoticeCreatedListener
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
     * @param  NoticeCreated  $event
     * @return void
     */
    public function handle(NoticeCreated $event)
    {
        //
    }
}
