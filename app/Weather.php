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
    protected $fillable = [
        'city_id', 'date', 'precipitation', 'temperature'
    ];
    
    public function getCityById($id) {
        return City::findOrFail($id);
    }
}
