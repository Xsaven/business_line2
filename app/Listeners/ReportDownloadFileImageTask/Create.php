<?php

namespace App\Listeners\ReportDownloadFileImageTask;

use App\Events\ReportDownloadFileImageTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
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
