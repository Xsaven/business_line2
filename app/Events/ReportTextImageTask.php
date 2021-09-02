<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportTextImageTask
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param int $task_id
     * @param string $comment
     * @param array $files
     */
    public function __construct(
        public int $task_id,
        public string $comment = '',
        public array $files = []
    ) {
    }
}
