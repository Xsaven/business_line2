<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportPhotoTask;
use App\Events\ReportStarQuizTask;
use App\Notifications\UserSuccessUploadedTaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  ReportStarQuizTask|ReportPhotoTask  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->validated) {
            \Auth::user()
                ->notify(
                    new UserSuccessUploadedTaskReport($event->task)
                );
        }
    }
}
