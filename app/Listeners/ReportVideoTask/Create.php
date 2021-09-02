<?php

namespace App\Listeners\ReportVideoTask;

use App\Events\ReportVideoTask;
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
     * @param  ReportVideoTask  $event
     * @return void
     */
    public function handle(ReportVideoTask $event)
    {
        //
    }
}
