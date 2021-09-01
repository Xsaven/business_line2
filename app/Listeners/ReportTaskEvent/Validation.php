<?php

namespace App\Listeners\ReportTaskEvent;

use App\Events\ReportTaskEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
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
     * @param  ReportTaskEvent  $event
     * @return void
     */
    public function handle(ReportTaskEvent $event)
    {
        //
    }
}
