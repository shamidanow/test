<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function weather() {
        return $this->belongsTo(Weather::class);
    }
}
