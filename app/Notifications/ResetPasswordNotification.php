<?php 

namespace Illuminate\Auth\Notifications;

use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the notification message.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\MessageBuilder
     */
    public function message($notifiable)
    {
        return $this->line('Estas recibiendo este correo porque:')
                    ->action('Reestablecer contraseña', url('password/reset', $this->token).'?email='.urlencode($notifiable->email))
                    ->line('Si no solicitó restablecer la contraseña, haga caso omiso a este correo.');
    }
}