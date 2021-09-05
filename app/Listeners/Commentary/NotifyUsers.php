<?php

namespace App\Listeners\Commentary;

use App\Events\Commentary;
use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Events\Ws\Exec;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  Commentary  $event
     * @return void
     */
    public function handle(Commentary $event)
    {
        if ($event->result() && $event->commentary) {
            if (\Auth::user()->active_commentaries) {
                //AllUserExec::dispatch(['update::add_commentary_child_id' => [$event->commentary->commentaryable_id, $event->commentary->id]]);
                AllUserExec::dispatch(["comment-add-{$event->commentary->commentaryable_id}" => $event->commentary->id]);
            } else {
                AllAdminExec::dispatch(['commentaries:update']);
            }
        }
    }
}
