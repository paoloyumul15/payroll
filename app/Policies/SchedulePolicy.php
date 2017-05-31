<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Only admin can create schedules
     */
    public function store()
    {
        return auth()->user()->type === 'Admin';
    }
}
