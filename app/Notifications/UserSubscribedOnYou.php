<?php

namespace App\Notifications;

use App\Models\User;

class UserSubscribedOnYou extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public User $user
    ) {
        $this->message = "На вас подписался пользователь";
        $this->link_title = $this->user->full_name;
        $this->link = "/user/" . $this->user->id;
        $this->user_id = $this->user->id;
    }
}
