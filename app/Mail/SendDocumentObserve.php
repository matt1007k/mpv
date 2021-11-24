<?php

namespace App\Mail;

use App\Models\Response;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDocumentObserve extends Mailable
{
    use Queueable, SerializesModels;

    public $response;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, Response $response)
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
        return $this->markdown('mails.send-document-observe', [
            'url' => url('/'),
        ])
            ->subject($this->subject);
    }
}
