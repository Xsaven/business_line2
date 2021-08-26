<?php

namespace App\Listeners\Register;

use App\Events\Register;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Attempt
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(Register $event)
    {
        if ($event->validated) {
            $event->attempted = (bool) User::create([
                'name' => $event->name,
                'lastname' => $event->lastname,
                'number' => $event->number,
                'email' => $event->email,
                'login' => explode('@', $event->email)[0],
                'password' => bcrypt($event->password),
            ]);
        }
    }
}
