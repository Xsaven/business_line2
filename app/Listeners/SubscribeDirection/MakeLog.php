<?php

namespace App\Listeners\SubscribeDirection;

use App\Events\SubscribeDirectionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeLog
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
     * @param  SubscribeDirectionEvent  $event
     * @return void
     */
    public function handle(SubscribeDirectionEvent $event)
    {
        //
    }
}
