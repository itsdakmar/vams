<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationDayBeforeMail extends Mailable
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
        $this->tarikh = Carbon::parse($data->tarikh)->format("d/m/Y");
        $this->url = route('service.confirmation', $data->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Notis Penyelenggaraan Untuk Jentera ". $this->no_kenderaan)
            ->markdown('emails.notification',[
            'no_kenderaan' => $this->no_kenderaan,
            'tarikh' => $this->tarikh,
            'url' => $this->url,
        ]);
    }
}
