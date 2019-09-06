<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeatherCreated extends Mailable
{
    use Queueable, SerializesModels;
    
    public $weather;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($weather)
    {
        $this->weather = $weather;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.project-created');
    }
}
