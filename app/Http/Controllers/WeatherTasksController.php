<?php

namespace App\Http\Controllers;

use App\Task;

class WeatherTasksController extends Controller
{
    public function update(Task $task) {
        $task->update([
            'completed' => request()->has('completed')
        ]);
        return back();
    }
}
