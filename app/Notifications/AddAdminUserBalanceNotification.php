<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AddAdminUserBalanceNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param  int  $balance
     */
    public function __construct(int $balance)
    {
        $action = $balance > 0 ? 'увеличен' : 'уменьшен';
        $this->message = "Ваш баланс был {$action} администратором на {$balance} баллов.";
    }
}
