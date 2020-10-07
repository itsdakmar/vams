<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostponedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $username, $tarikh, $no_kenderaan;

    /**
     * Create a new message instance.
     *
     * @param $data
     * @param $username
     */
    public function __construct($data, $username)
    {
        $this->username = $username;
        $this->tarikh = Carbon::parse($data->tarikh)->format("d/m/Y");
        $this->no_kenderaan = $data->vehicle->no_kenderaan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Notis Penangguhan Penyelenggaran")
            ->markdown('emails.postponed',
            [
                'no_kenderaan' => $this->no_kenderaan,
                'tarikh' => $this->tarikh,
                'username' => $this->username,
                'url' => route('services.postponed')
            ]);
    }
}
