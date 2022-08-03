<?php

namespace App\Notifications;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Submission $submission
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed                                          $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->from($this->submission->email, $this->submission->name)
            ->level('info')
            ->subject("[{$this->submission->app}] New contact")
            ->greeting('Hello,')
            ->line("A new contact is submitted by {$this->submission->name}.")
            ->line("Email: {$this->submission->email}")
            ->line('Message:')
            ->line("{$this->submission->message}")
            ->salutation('Thanks.')
            ->action('View app', $this->submission->url)
        ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
