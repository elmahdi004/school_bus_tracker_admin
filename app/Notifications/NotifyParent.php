<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyParent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $finish;
    public function __construct(bool $finish)
    {
        $this->finish = $finish;
    }
/**
 * Get the notification's database type.
 *
 * @return string
 */
public function databaseType(object $notifiable): string
{
    return 'debart-de-bus';
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

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        if($this->finish){
            return [
                'message'=>"le bus arrive à l'école",
                'body'=>"Bonjour, votre enfant est arrivé à l'école en toute sécurité."
            ];
        }else{
            return [
                'message'=>'départ de bus scolaire',
                'body'=>'Le bus scolaire est parti. Votre enfant est en route'
            ];

        }
    }
}
