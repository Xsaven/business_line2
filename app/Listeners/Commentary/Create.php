<?php

namespace App\Listeners\Commentary;

use App\Events\Commentary;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
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
     * @param  Commentary  $event
     * @return void
     */
    public function handle(Commentary $event)
    {
        //
    }
}
