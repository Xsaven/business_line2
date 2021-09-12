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
    public function __construct(int $balls, Task $task)
    {
        $this->message = "Вы заработали {$balls} баллов за прохождение звёздной викторины";
        $this->link_title = $task->name;
        $this->link = route('task', ['task' => $task->id]);
    }
}
