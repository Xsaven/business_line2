<?php

namespace App\Notifications;

use App\Models\Task;
use App\Models\User;

class UserStickerYouReportNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public User $user,
        public Task $task
    ) {
        $this->message = "<a href='/user/{$user->id}'>{$user->full_name}</a> поставил стикер к вашему отчету по заданию";
        $this->link_title = $this->task->name;
        $this->link = "/task/{$this->task->id}";
    }
}
