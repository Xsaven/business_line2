<?php

namespace App\Notifications;

use App\Models\User;

class YouUnSubscribedOnUser extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public User $user
    ) {
        $this->message = "Вы успешно отписались от пользователя";
        $this->link_title = $this->user->full_name;
        $this->link = "/user/" . $this->user->id;
        $this->user_id = $this->user->id;
    }
}
