<?php

namespace App\Listeners\Register;

use App\Events\Register;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(Register $event)
    {
        $event->validated = ! quick_validate([
            'name' => $event->name,
            'lastname' => $event->lastname,
            'number' => $event->number,
            'email' => $event->email,
            'password' => $event->password,
        ], [
            'name' => 'required|string|min:3|max:191',
            'lastname' => 'required|string|min:3|max:191',
            'number' => 'required|numeric|min:3|max:191',
            'password' => 'required|string|min:6|max:191|confirmed',
        ]);
    }
}
