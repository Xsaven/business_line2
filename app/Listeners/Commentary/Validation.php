<?php

namespace App\Listeners\Commentary;

use App\Events\Commentary;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  Commentary  $event
     * @return void
     */
    public function handle(Commentary $event)
    {
        $event->validated = ! quick_validate(['m' => $event->message, 'pid' => $event->parent_id], [
            'm' => 'required|string|min:1|max:1200',
            'pid' => 'required|int|min:1|exists:commentaries,id',
        ]) && \Auth::check();
    }
}