<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;
use App\Models\Inscrito;

class PagSeguroNotification extends Notification
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
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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

    /**
     * Callback de notificação do PagSeguro
     *
     * @param [type] $information
     * @return void
     */
    public static function pagseguro($information)
    {
        $response = PagSeguroNotification::setResponse($information);        
        \Log::info('Transação de '.$response['name'].' foi '.$response['status_transacao']);        
        
        $pagou = $response['status_transacao'] == 'paga';       
        $inscrito = Inscrito::find($response['id']);
        $inscrito->pagou = $pagou;
        $inscrito->save();        
    }

    public static function setResponse($information)
    {

        $status_transacao = strtolower($information->getStatus()->getName());
        $sender = $information->getSender();
        $email = $sender->getEmail();
        $name = $sender->getName();

        $response = [
            'status_transacao' => $status_transacao,
            'email' => $email,
            'name' => $name,
        ];

        foreach ($information->getItems() as $item) {
            $id = $item->getId();
            $response['id'] = $id;
        }

        return $response;
    }

}