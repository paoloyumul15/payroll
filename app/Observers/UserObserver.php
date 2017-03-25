<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Listen to the User saving event.
     *
     * @param  User $user
     * @return void
     */
    public function saving(User $user)
    {
        $user->company_id = companyId();
    }
}
