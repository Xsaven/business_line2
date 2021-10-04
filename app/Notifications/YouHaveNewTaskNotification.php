<?php

namespace App\Notifications;

use App\Models\Task;

class YouHaveNewTaskNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Task $task
    ) {
        $this->message = 'Вам доступно новое задание';
        $this->link_title = $this->task->name;
        $this->link = '/task/'.$this->task->id;
    }
}
