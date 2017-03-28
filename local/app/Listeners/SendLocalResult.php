<?php

namespace App\Listeners;

use App\Events\LocalResult;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLocalResult
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
     * @param  LocalResult  $event
     * @return void
     */
    public function handle(LocalResult $event)
    {
        //
    }
}
