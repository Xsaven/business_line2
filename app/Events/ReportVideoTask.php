<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportVideoTask
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param  int  $task_id
     * @param  string|null  $file
     * @param  bool  $validated
     * @param  Task|null  $task
     */
    public function __construct(
        public int $task_id,
        public ?string $file = null,
        public bool $validated = false,
        public ?Task $task = null,
    ) {
    }
}
