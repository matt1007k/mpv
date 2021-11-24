<?php

namespace App\Notifications;

use App\Models\Response;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sendAnswerDocumentNotification extends Notification
{
    use Queueable;

    public $subject;
    protected $response;
    protected $urlSISGEDO = "http://sisgedo.regionayacucho.gob.pe/app/main.php?ini=ini";

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subject, Response $response)
    {
        $this->subject = $subject;
        $this->response = $response;
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
            ->markdown('mails.send-answer-document', [
                'response' => $this->response,
                'user' => $notifiable,
                'url' => $this->urlSISGEDO,
            ])
            ->subject('REMITO REGISTRO DE SISGEDO')
        ;
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
