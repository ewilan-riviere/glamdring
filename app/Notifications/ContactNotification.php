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
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from($this->submission->email, $this->submission->name)
            ->level('info')
            ->subject("[{$this->submission->app}] New contact")
            ->greeting('Hello,')
            ->line("A new contact is submitted by {$this->submission->name}.")
            ->line("Email: {$this->submission->email}")
            ->line('Message:')
            ->line("{$this->submission->message}")
            ->line('Extras:')
            ->line(implode(', ', $this->submission->extras ?? 'No extras.'))
            ->salutation('Thanks.')
            ->action('View app', $this->submission->origin)
        ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name' => $this->submission->name,
            'email' => $this->submission->email,
            'message' => $this->submission->message,
            'extras' => $this->submission->extras,
        ];
    }
}
