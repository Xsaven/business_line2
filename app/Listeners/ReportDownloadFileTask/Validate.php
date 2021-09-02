<?php

namespace App\Listeners\ReportDownloadFileTask;

use App\Events\ReportDownloadFileTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validate
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
     * @param  ReportDownloadFileTask  $event
     * @return void
     */
    public function handle(ReportDownloadFileTask $event)
    {
        //
    }
}
