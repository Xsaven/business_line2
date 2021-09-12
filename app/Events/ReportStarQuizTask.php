<?php

namespace App\Events;

use App\Models\Star;
use App\Models\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportStarQuizTask
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param  int  $task_id
     * @param  array  $quiz_answers
     * @param  bool  $validated
     * @param  Task|null  $task
     * @param  Star|null  $star
     * @param  int  $balls
     */
    public function __construct(
        public int $task_id,
        public array $quiz_answers,
        public bool $validated = false,
        public ?Task $task = null,
        public ?Star $star = null,
        public int $balls = 0,
        public ?TaskReport $taskReport = null,
    ) {
    }
}
