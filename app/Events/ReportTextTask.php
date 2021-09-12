<?php

namespace App\Events;

use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportTextTask
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param  int  $task_id
     * @param  string  $comment
     * @param  int  $fun_id
     * @param  bool  $validated
     * @param  Task|null  $task
     */
    public function __construct(
        public int $task_id,
        public string $comment,
        public int $fun_id = 0,
        public bool $validated = false,
        public ?Task $task = null,
        public ?TaskReport $taskReport = null,
    ) {
    }
}
