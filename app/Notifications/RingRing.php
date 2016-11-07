<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Request;

class RingRing extends Notification
{
    use Queueable;

    private $picture;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($picture)
    {
        $this->picture = $picture;
    }

    
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
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
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }

    /**
     * @author Frank Wichers Schreur <f.wichers@texemus.com>
     *
     * @param $notifiable
     *
     * @return $this
     *
     */
    public function toSlack($notifiable)
    {
        $url = env('APP_URL') . "/" . $this->picture;

        return (new SlackMessage)
            ->success()
            ->from('Doorbell', ':bell:')
            ->content('Ring ring, ' . Request::get('name').' staat bij de deur!')
            ->attachment(function ($attachment) use ($url) {
                $attachment->title(Request::get('name'), $url)
                    ->content([
                        'image_url' => $url
                    ]);
            });
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
