<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\WeatherCreated;

class Weather extends Model
{
    protected $table = 'weather';
    
    protected $dispatchesEvents = [
        'created' => WeatherCreated::class
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function owner() {
        return $this->belongsTo(User::class);
    }
    
    public function getCityById($id) {
        return City::findOrFail($id);
    }
    
    public function tasks() {
        return $this->hasMany(Task::class);
    }
    
    public function addTask($task) {
        $this->tasks()->create($task);
        
//         return Task::create([
//             'weather_id' => $this->id,
//             'description' => $description
//         ]);
    }
}
