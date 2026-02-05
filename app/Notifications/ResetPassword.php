<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends BaseResetPassword
{
    use Queueable;

    public function toMail($notifiable)
    {
        $url = $this->resetUrl($notifiable);

        return (new MailMessage)
            ->subject('Reset Password TESTING')
            ->greeting('Hello!')
            ->line('We received a request to reset your password.')
            ->line('Click the button below to continue.')
            ->action('Reset Password', $url)
            ->line('If you did not request this, you can ignore this email.');
    }
}