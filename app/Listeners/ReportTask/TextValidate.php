<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportTextImageTask;
use App\Events\ReportTextTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TextValidate
{
    /**
     * @param ReportTextTask $event
     * @return bool|void
     */
    public function handle($event)
    {
        if (is_string($event->comment)) {
            return true;
        }
    }
}
