<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\SupportStaffAppraisal;
class NotifySupportheadOwner extends Notification 
{
    use Queueable;
    public $support;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(supportStaffAppraisal $support)
    {
        
        $this->support = $support;

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
            
            'support' => $this->support, 
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'data' => [
                'support' => $this->support,
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
