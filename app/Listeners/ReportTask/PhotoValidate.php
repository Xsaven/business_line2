<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportPhotoTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PhotoValidate
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
     * @param  ReportPhotoTask  $event
     * @return void
     */
    public function handle(ReportPhotoTask $event)
    {
        //
    }
}
