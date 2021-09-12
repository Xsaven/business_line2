<?php

namespace App\Notifications;

use App\Models\Task;

class AdminApproveTaskReportNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Task $task
    ) {
        $this->message = "Администратор подтвердил ваш отчёт и вы заработали {$this->task->cost} баллов за прохождение задания";
        $this->link_title = $task->name;
        $this->link = route('task', ['task' => $task->id]);
    }
}
