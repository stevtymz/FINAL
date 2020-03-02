<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\SupportStaffAppraisal;
class NotifySupportstaff extends Notification 
{
    use Queueable;
    public $notifysupport;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(SupportStaffAppraisal $notifysupport)
    {
        
        $this->notifysupport = $notifysupport;

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
            
            'notifysupport' => $this->notifysupport 
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'data' => [
                'notifysupport' => $this->notifysupport
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
