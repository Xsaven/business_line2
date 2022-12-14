<?php

namespace App\Notifications;

use App\Models\Task;

class UserSuccessUploadedStarQuizReport extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public int $balls,
        public Task $task
    ) {
        $this->message = "Вы заработали {$this->balls} баллов за прохождение звёздной викторины";
        $this->link_title = $this->task->name;
        $this->link = route('task', ['task' => $this->task->id]);
    }
}
