<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportTextVideoTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VideoValidate
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
     * @param  ReportTextVideoTask  $event
     * @return void
     */
    public function handle(ReportTextVideoTask $event)
    {
        //
    }
}
