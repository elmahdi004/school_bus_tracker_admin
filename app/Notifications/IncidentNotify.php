<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IncidentNotify extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $type;
    private $description;
    private $route_id;

    public function __construct($type,$description,$route_id)
    {
        $this->type = $type;
        $this->description = $description;
        $this->route_id = $route_id;
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
 * Get the notification's database type.
 *
 * @return string
 */
public function databaseType(object $notifiable): string
{
    return 'incident-notification';
}

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
            return [
                'message'=>$this->type,
                'body'=>$this->description,
                'route_id'=>$this->route_id
            ];
    }
}
