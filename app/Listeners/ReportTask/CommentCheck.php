<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportFunTask;
use App\Events\ReportTextImageTask;
use App\Events\ReportTextImageVideoTask;
use App\Events\ReportTextTask;
use App\Events\ReportTextVideoTask;
use App\Models\User;
use App\Notifications\UserNotedYouInTaskNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentCheck
{
    /**
     * Handle the event.
     *
     * @param  ReportTextImageTask|ReportFunTask|ReportTextTask|ReportTextImageVideoTask|ReportTextVideoTask  $event
     * @return void
     */
    public function handle($event)
    {

    }
}
