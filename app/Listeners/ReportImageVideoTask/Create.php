<?php

namespace App\Listeners\ReportImageVideoTask;

use App\Events\ReportImageVideoTask;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportImageVideoTask  $event
     * @return void
     */
    public function handle(ReportImageVideoTask $event)
    {
    }
}
