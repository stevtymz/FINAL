<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AssignedSupportstaffNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->supportStaffAppraisal = $data['supportStaffAppraisal'];
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
            ->subject($this->data['action'])
            ->greeting('Hi,')
            ->line($this->data['action'])
            ->line("Employee: ".$this->supportStaffAppraisal->profile->first_name)  
            ->line("Created at: ".$this->supportStaffAppraisal->created_at)
            ->action('View full Appraisal', route('admin.support-staff-appraisals.show', $this->supportStaffAppraisal->id))
            ->line('Thank you')
            ->line(config('app.name') . ' MUST-SPA SYSTEM')
            ->salutation('Regards');
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
