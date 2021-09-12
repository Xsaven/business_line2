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
    public function __construct(Task $task)
    {
        $this->message = "Администратор отклонил ваш отчет за прохождение задания";
        $this->link_title = $task->name;
        $this->link = route('task', ['task' => $task->id]);
    }
}
