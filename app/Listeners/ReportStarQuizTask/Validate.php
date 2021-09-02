<?php

namespace App\Listeners\ReportStarQuizTask;

use App\Events\ReportStarQuizTask;
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
     * @param  ReportStarQuizTask  $event
     * @return void
     */
    public function handle(ReportStarQuizTask $event)
    {
        //
    }
}
