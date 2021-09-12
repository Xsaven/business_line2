<?php

namespace App\Notifications;

use App\Models\Task;

class DeleteTaskReportNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public Task $task,
        public int $cost,
    ){
        $this->message = "Баланс уменьшился на {$cost} из-за удаления вашего отчёта по заданию";
        $this->link_title = $this->task->name;
        $this->link = "/task/{$this->task->id}";
    }
}
