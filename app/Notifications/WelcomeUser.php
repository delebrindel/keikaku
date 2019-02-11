<?php

namespace App\Notifications;


use App\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeUser extends Notification
{
    use Queueable;
    protected $email="correo";

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->email = $user->correo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(env('ADMIN_MAIL_ADDRESS'))
            ->subject('Bienvenido!')
            ->greeting(sprintf('Hola, %s', $this->user->nombre." ".$this->user->paterno." ".$this->user->materno." / ".$this->user->usuario))
            ->line('Gracias por crear tu cuenta. Disfruta la aplicación.')
            ->action('Ingresar', route('login', [$this->user->username]));
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
            //
        ];
    }
}