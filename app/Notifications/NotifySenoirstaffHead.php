<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Performance;
class NotifySenoirstaffHead extends Notification 
{
    use Queueable;
    public $performance;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Performance $performance)
    {
        $this->performance = $performance;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return  ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
            'performance' => $this->performance
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'data' => [
                'performance' => $this->performance
            ]
        ];
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
