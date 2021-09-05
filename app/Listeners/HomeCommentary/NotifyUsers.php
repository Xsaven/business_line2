<?php

namespace App\Listeners\HomeCommentary;

use App\Events\HomeCommentary;
use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Jobs\AdminStatisticJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param  HomeCommentary  $event
     * @return void
     */
    public function handle(HomeCommentary $event)
    {
        if ($event->result() && $event->commentary) {
            if (\Auth::user()->active_commentaries) {
                AllUserExec::dispatch(['v-home-commentaries:add_to_child' => [$event->commentary->id]]);
            } else {
                AllAdminExec::dispatch(['commentaries:update']);
            }

            AdminStatisticJob::dispatch();
        }
    }
}
