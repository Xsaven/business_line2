<?php

namespace App\Listeners\TaskSticker;

use App\Events\TaskSticker;
use App\Repositories\AuthUserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUsers
{
    /**
     * Handle the event.
     *
     * @param  TaskSticker  $event
     * @return void
     */
    public function handle(TaskSticker $event)
    {
        if ($event->result()) {
            $user = app(AuthUserRepository::class)
                ->user;

            $user->logs()->create([
                'field' => 'like',
                'type' => 'like',
                'message' => 'Поставил стикер отчёту '.$event->task_report->id,
            ]);

            $user->increment('stickers');
        }
    }
}
