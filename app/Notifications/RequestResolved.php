<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class RequestResolved extends Notification implements ShouldQueue
{
    use Queueable;

    public $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if ($notifiable->receives_mail) {
            return ['database', 'broadcast', 'mail'];
        } else {
            return ['database', 'broadcast'];
        }
    }

    public function toArray($notifiable)
    {
        return [
            'request_id' => $this->request->id,
            'auditorium_name' => $this->request->auditorium->name,
            'n_message' => "Your request for the ".$this->request->auditorium->name." changed status.",
            'n_url' => route('requests.show', ['id' => $this->request->id, 'from' => 'notification']),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'data' => $this->toArray($notifiable),
        ]);
    }

    public function toMail($notifiable)
    {
        $url = route(
            'requests.show',
            [
                'id' => $this->request->id,
                'from' => 'mail',
                'notification' => $this->id,
            ]
        );

        return (new MailMessage)
            ->subject('Order resolution')
            ->greeting('Hello!')
            ->line('One of your orders ('.$this->request->event.') changed status.')
            ->action('See order', $url)
            ->line('Thank you for using our system!');
    }
}
