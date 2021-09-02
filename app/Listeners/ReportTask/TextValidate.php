<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportTextImageTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TextValidate
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
     * @param  ReportTextImageTask  $event
     * @return void
     */
    public function handle(ReportTextImageTask $event)
    {
        //
    }
}
