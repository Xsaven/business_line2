<?php

namespace App\Listeners\ReportTextTask;

use App\Events\ReportTextTask;
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
     * @param  ReportTextTask  $event
     * @return void
     */
    public function handle(ReportTextTask $event)
    {
        //
    }
}
