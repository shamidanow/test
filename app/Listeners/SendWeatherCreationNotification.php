<?php

namespace App\Listeners;

use App\Mail\WeatherCreated as WeatherCreatedMail;
use App\Events\WeatherCreated;
use Illuminate\Support\Facades\Mail;

class SendWeatherCreationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WeatherCreated  $event
     * @return void
     */
    public function handle(WeatherCreated $event)
    {
        Mail::to($event->weather->owner->email)->send(
            new WeatherCreatedMail($event->weather)
        );
    }
}
