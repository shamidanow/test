<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class WeatherCreated
{
    use Dispatchable, SerializesModels;
    
    public $weather;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($weather)
    {
        $this->weather = $weather;
    }
}
