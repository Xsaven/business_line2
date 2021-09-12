<?php

namespace App\Notifications;

use App\Models\Task;

class UserSuccessCompleteTaskReport extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->message = "Вы получили {$task->cost} баллов за пройденное задание";
        $this->link_title = $task->name;
        $this->link = route('task', ['task' => $task->id]);
    }
}
