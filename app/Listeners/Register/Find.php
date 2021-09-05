<?php

namespace App\Listeners\Register;

use App\Events\Register;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Find
{
    /**
     * Handle the event.
     *
     * @param  Register  $event
     * @return void
     */
    public function handle(Register $event)
    {
        if ($event->validated) {
            $event->user = User::where('password', 'none')
                ->where('number', $event->number)
                ->where('lastname', $event->lastname)
                ->where('name', $event->name)->first();
        }
    }
}
