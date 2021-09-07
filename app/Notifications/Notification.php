<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification as LaravelNotification;

class Notification extends LaravelNotification
{
    use Queueable;

    /**
     * Toast text.
     * @var string|null
     */
    protected ?string $text = null;

    /**
     * Supported: info, error, success, warning.
     * @var string
     */
    protected string $type = 'info';

    /**
     * Notify message.
     * @var string|null
     */
    protected ?string $message = null;

    /**
     * User id about.
     * @var string|null
     */
    protected ?string $user_id = null;

    /**
     * Notify link title.
     * @var string|null
     */
    protected ?string $link_title = null;

    /**
     * Notify link.
     * @var string|null
     */
    protected ?string $link = null;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  User  $user
     * @return BroadcastMessage
     */
    public function toBroadcast(User $user)
    {
        return new BroadcastMessage([
            'text' => $this->text ?: $this->message,
            'status' => $this->type,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'avatar' => user_avatar($this->user_id),
            'message' => $this->message,
            'link_title' => $this->link_title,
            'link' => $this->link,
        ];
    }
}
