<?php

namespace App\Listeners;

use App\Events\NoticeUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NoticeUpdatedListener
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
     * @param  NoticeUpdated  $event
     * @return void
     */
    public function handle(NoticeUpdated $event)
    {
        //
    }
}
