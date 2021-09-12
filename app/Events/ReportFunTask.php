<?php

namespace App\Events;

use App\Models\Task;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportFunTask
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param  int  $task_id
     * @param  int  $fun_id
     * @param  string|null  $comment
     * @param  string|null  $file
     * @param  bool  $validated
     * @param  Task|null  $task
     * @param  User|null  $user
     */
    public function __construct(
        public int $task_id,
        public int $fun_id,
        public ?string $comment = null,
        public ?string $file = null,
        public bool $validated = false,
        public ?Task $task = null,
        public ?User $user = null,
        public bool $is_video = false,
        public bool $is_photo = false,
    ) {
    }
}
