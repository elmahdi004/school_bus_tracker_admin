<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReminderNotification extends Notification
{
    use Queueable;

    private $vehicle_id;
    private $vehicle_name;
    private $maintenance_type;
    public function __construct($vehicle_id,$vehicle_name,$maintenance_type)
    {
        $this->vehicle_id = $vehicle_id;
        $this->vehicle_name = $vehicle_name;
        $this->maintenance_type = $maintenance_type;
    }
/**
 * Get the notification's database type.
 *
 * @return string
 */
public function databaseType(object $notifiable): string
{
    return 'maintenance-reminder';
}
    /**
     * Get the notification's delivery channels.
    
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'vehicle_id'=>$this->vehicle_id,
            'vehicle_name'=>$this->vehicle_name,
            'maintenance_type'=>$this->maintenance_type,
        ];
    }
}
