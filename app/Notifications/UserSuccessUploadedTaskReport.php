<?php

namespace App\Notifications;

use App\Models\Task;

class UserSuccessUploadedTaskReport extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Task $task
    ) {
        $this->message = 'Вы успешно отправили отчёт по заданию';
        $this->link_title = $this->task->name;
        $this->link = route('task', ['task' => $this->task->id]);
    }
}
