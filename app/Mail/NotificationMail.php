<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $no_kenderaan, $tarikh, $url;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->no_kenderaan = $data->vehicle->no_kenderaan;
        $this->tarikh = $data->tarikh;
        $this->url = route('service.confirmation', $data->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notification',[
            'no_kenderaan' => $this->no_kenderaan,
            'tarikh' => $this->tarikh,
            'url' => $this->url,
        ]);
    }
}
