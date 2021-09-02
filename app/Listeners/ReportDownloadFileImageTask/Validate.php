<?php

namespace App\Listeners\ReportDownloadFileImageTask;

use App\Events\ReportDownloadFileImageTask;
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
     * @param  ReportDownloadFileImageTask  $event
     * @return void
     */
    public function handle(ReportDownloadFileImageTask $event)
    {
        //
    }
}
