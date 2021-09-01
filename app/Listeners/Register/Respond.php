<?php

namespace App\Listeners\Register;

use App\Events\Register;
use App\Jobs\AdminStatisticJob;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Respond
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(Register $event)
    {
        if ($event->result()) {
            respond()->toast_success('Вы успешно зарегистрировались')
                ->reload();
            AdminStatisticJob::dispatch();
        }
    }
}
