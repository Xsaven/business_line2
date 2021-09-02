<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportStarQuizTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
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
     * @param  ReportStarQuizTask  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
