<?php

namespace App\Notifications;

use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;

class TaskReportForSubscribersNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public User $user,
        public Task $task
    ) {
        $this->message = "Пользователь <a href='/user/{$this->user->id}'>{$this->user->full_name}</a>, опубликовал новый отчёт в задании";
        $this->link_title = $this->task->name;
        $this->link = '/task/'.$this->task->id;
        $this->user_id = $this->user->id;
    }
}
