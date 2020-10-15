<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use DB;

class SendEmailUpdateEditors extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        $data = DB::table('users') 
                ->join('sessions', 'users.id', '=', 'sessions.user_id')
                ->join('posts', 'users.id', '=', 'posts.user_id')   
                ->select( 'sessions.ip_address')
                ->first();
        $ldate = date('Y-m-d H:i:s');
        return (new MailMessage)
                    ->line('Informacion de los editores que realizaron cambios.')
                    ->line('Nombre del editor: '. $notifiable->name)
                    ->line('Direccion ip: ' . $data->ip_address)
                    ->line('Fecha de la actualizacion: ' . $ldate)
                    ->line('Gracias!');
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
