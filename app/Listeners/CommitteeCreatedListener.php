<?php

namespace App\Listeners;

use App\Events\CommitteeCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommitteeCreatedListener
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
     * @param  CommitteeCreated  $event
     * @return void
     */
    public function handle(CommitteeCreated $event)
    {
        //
    }
}
