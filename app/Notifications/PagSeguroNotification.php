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
        \Log::info(print_r($information, true));

        \Log::info('Chamada POST do PagSeguro feita com sucesso. Depurando informações');
        $response = PagSeguroNotification::setResponse($information);        
        \Log::info('Transação de '.$response['name'].' foi '.$response['status_transacao']);        
        
        $pagou = $response['status_transacao'] == 'paga' || $response['status_transacao'] == 'disponível';       
        $inscrito = Inscrito::find($response['id']);
        $inscrito->pagou = $pagou;
        $inscrito->save();        
    }

    public static function setResponse($information)
    {
        \Log::info('Início depuração 1');
        
        $status_transacao = strtolower($information->getStatus()->getName());
        \Log::info('Início depuração 2');
        $sender = $information->getSender();
        \Log::info('Início depuração 3');
        $email = $sender->getEmail();
        \Log::info('Início depuração 4');
        $name = $sender->getName();
        \Log::info('Início depuração 5');

        $response = [
            'status_transacao' => $status_transacao,
            'email' => $email,
            'name' => $name,
        ];

        \Log::info($response['name']);
        \Log::info('Início depuração 6');

        \Log::info('Início depuração 7');
        foreach ($information->getItems() as $item) {
            $id = $item->getId();
            $response['id'] = $id;
        }
        \Log::info('Início depuração 8');
        \Log::info($response);

        return $response;
    }

}
