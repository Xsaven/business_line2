<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * @var int
     */
    protected int $user_id;

    /**
     * Create a new message instance.
     *
     * @param $token
     * @param  int  $user_id
     */
    public function __construct($token, int $user_id)
    {
        $this->token = $token;
        $this->user_id = $user_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::find($this->user_id);

        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $user->email,
        ], false));

        return $this->subject('Восстановление пароля')
            ->view('emails.reset_password_email', compact('user', 'url'));
    }
}
