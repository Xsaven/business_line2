<?php

namespace App\Notifications;

use App\Models\Task;

class AdminDropTaskReportNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Task $task
    ) {
        $this->message = 'Администратор отклонил ваш отчет за прохождение задания';
        $this->link_title = $this->task->name;
        $this->link = route('task', ['task' => $this->task->id]);
    }
}
