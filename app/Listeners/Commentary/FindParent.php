<?php

namespace App\Listeners\Commentary;

use App\Events\Commentary;
use App\Repositories\CommentaryRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FindParent
{
    /**
     * Handle the event.
     *
     * @param  Commentary  $event
     * @return void
     */
    public function handle(Commentary $event)
    {
        if ($event->validated) {
            $event->parent = app(CommentaryRepository::class)
                ->find($event->parent_id);
        }
    }
}
