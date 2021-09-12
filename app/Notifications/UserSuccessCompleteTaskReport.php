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
    public function __construct(
        public Task $task
    ) {
        $this->message = "Вы получили {$this->task->cost} баллов за пройденное задание";
        $this->link_title = $this->task->name;
        $this->link = route('task', ['task' => $this->task->id]);
    }
}
