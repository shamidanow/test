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
    
    public function update(Task $task) {
//         if (request()->has('completed')) {
//             $task->complete();
//         } else {
//             $task->incomplete();
//         }

//         request()->has('completed') ? $task->complete() : $task->incomplete();

        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();
        
//         $task->update([
//             'completed' => request()->has('completed')
//         ]);
        
        return back();
    }
}
