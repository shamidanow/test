<?php

namespace App\Http\Controllers;

use App\Task;
use App\Weather;

class WeatherTasksController extends Controller
{
    public function store(Weather $weather) {
        $attributes = request()->validate(['description' => 'required']);
        
        $weather->addTask($attributes);
        
        return back();
    }
}
