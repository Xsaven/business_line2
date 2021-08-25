<?php

namespace App\Listeners\Login;

use App\Events\Login;
use App\Jobs\AdminStatisticJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Respond
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(Login $event)
    {
        if ($event->result()) {
            respond()->reload();

            AdminStatisticJob::dispatch();
        }
    }
}
