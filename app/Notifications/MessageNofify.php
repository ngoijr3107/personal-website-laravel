<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageNofify extends Notification implements ShouldQueue
{
    use Queueable;

    public $contactMessage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contactMessage)
    {
        $this->contactMessage = $contactMessage;
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
            ->greeting('Hi Fahim!')
            ->subject('Portfolio - Message!')
            ->line($this->contactMessage->name . " sent a message in your website.")
            ->line("Email: " . $this->contactMessage->email)
            ->line("Message: " . $this->contactMessage->message)
            ->action('View Messages', url('/messages'))
            ->line('Thank you! Have a nice day.')
            ->replyTo($this->contactMessage->email);
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
