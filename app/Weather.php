<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeatherCreated;

class Weather extends Model
{
    protected $table = 'weather';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    protected static function boot() {
        parent::boot();
        
        static::created(function ($weather) {
            Mail::to($weather->owner->email)->send(
                new WeatherCreated($weather)
            );
        });
    }
    
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
