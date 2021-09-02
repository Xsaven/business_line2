<?php

namespace App\Listeners\ReportTextImageVideoTask;

use App\Events\ReportTextImageVideoTask;
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
     * @param  ReportTextImageVideoTask  $event
     * @return void
     */
    public function handle(ReportTextImageVideoTask $event)
    {
        //
    }
}
