<?php

namespace App\Policies;

use App\User;
use App\Weather;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeatherPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the weather.
     *
     * @param  \App\User  $user
     * @param  \App\Weather  $weather
     * @return mixed
     */
    public function update(User $user, Weather $weather)
    {
        return $weather->owner_id == $user->id;
    }
}
