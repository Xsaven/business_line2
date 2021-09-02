<?php

namespace App\Listeners\ReportQuizTask;

use App\Events\ReportQuizTask;
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
     * @param  ReportQuizTask  $event
     * @return void
     */
    public function handle(ReportQuizTask $event)
    {
        //
    }
}
