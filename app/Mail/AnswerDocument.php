<?php

namespace App\Mail;

use App\Models\Response;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerDocument extends Mailable
{
    use Queueable, SerializesModels;

    public $response;
    public $title = 'REMITO REGISTRO DE SISGEDO';
    public $subject;
    public $url = "http://sisgedo.regionayacucho.gob.pe/app/main.php?ini=ini";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, Response $response)
    {
        $this->subject = $subject;
        $this->response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.send-answer-document')
            ->subject($this->title);
    }
}
