<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppliedNotification extends Notification
{
    use Queueable;

    protected $application;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $channel = ['database'];

        if($notifiable->channels) {
            $channel = explode(',', $notifiable->channels);
        }

        return $channel;
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'msg' => 'New Student '.$this->name.' Apply on ' . $this->course,
    //         'url' => url('/applications')
    //     ];
    // }

    // public function toBroadcast($notifiable)
    // {
    //     return [
    //         'msg' => 'New Student Mohammed Apply on Laravel Course - Broadcast',
    //         'url' => url('/applications')
    //     ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'msg' => 'New Student '.$this->application->user->name.' Apply on ' . $this->application->course->name,
            'url' => url('/applications')
        ];
    }
}
