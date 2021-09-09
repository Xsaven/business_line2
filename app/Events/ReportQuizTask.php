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

class ReportQuizTask
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param Task|null $task
     * @param array $quiz_answers
     * @param int $balls
     */
    public function __construct(
        public ?Task $task,
        public array $quiz_answers,
        public int $balls = 0
    ) {
    }
}
