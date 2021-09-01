<?php

namespace App\Listeners\HomeCommentary;

use App\Events\HomeCommentary;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        $event->validated = ! quick_validate(['m' => $event->message], [
            'm' => 'required|string|min:1|max:1200',
        ]);
    }
}
