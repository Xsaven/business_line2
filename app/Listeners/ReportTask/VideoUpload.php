<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportTextVideoTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VideoUpload
{
    /**
     * Handle the event.
     *
     * @param  ReportTextVideoTask  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
