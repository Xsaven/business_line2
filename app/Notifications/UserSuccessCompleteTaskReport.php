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
        public Task $task,
        public ?int $cost = null
    ) {
        $this->cost = $this->cost ?: $this->task->cost;
        $this->message = "Вы получили {$this->cost} баллов за пройденное задание";
        $this->link_title = $this->task->name;
        $this->link = route('task', ['task' => $this->task->id]);
    }
}
