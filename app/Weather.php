<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = 'weather';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
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
