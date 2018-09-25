<?php

namespace App\Listeners;

use App\Events\CommitteeUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommitteeUpdatedListener
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
     * @param  CommitteeUpdated  $event
     * @return void
     */
    public function handle(CommitteeUpdated $event)
    {
        //
    }
}
