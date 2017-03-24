<?php

namespace App\Observers;


use App\Models\Profile;

class ProfileObserver
{
    /**
     * Listen to the User saving event.
     *
     * @param Profile $profile
     * @return void
     */
    public function saving(Profile $profile)
    {
        $profile->status = 'Active';
    }
}
