<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyKetuaBalaiMail extends Mailable
{
    use Queueable, SerializesModels;
    public $no_kenderaan, $tarikh;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->no_kenderaan = $data->vehicle->no_kenderaan;
        $this->tarikh = Carbon::parse($data->tarikh)->format("d/m/Y");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Notis Penyelenggaraan Untuk Jentera ". $this->no_kenderaan)
            ->markdown('emails.no_button',[
                'no_kenderaan' => $this->no_kenderaan,
                'tarikh' => $this->tarikh,
            ]);
    }
}
