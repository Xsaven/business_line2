<?php

namespace App\Listeners\HomeCommentary;

use App\Events\HomeCommentary;
use Wkhooy\ObsceneCensorRus;

class Validation
{
    /**
     * Handle the event.
     *
     * @param  HomeCommentary  $event
     * @return void
     */
    public function handle(HomeCommentary $event)
    {
        $event->obscenities = ObsceneCensorRus::isAllowed($event->message);

        $event->validated = $event->obscenities && ! quick_validate([
                'm' => $event->message,
            ], [
                'm' => 'required|string|min:1|max:1200',
            ]) && \Auth::check();
    }
}
