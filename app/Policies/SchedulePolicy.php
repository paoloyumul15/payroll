<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Only admin can see the form for creating schedules
     */
    public function create()
    {
        return auth()->user()->type === 'Admin';
    }

    /**
     * Only admin can create schedules
     */
    public function store()
    {
        return auth()->user()->type === 'Admin';
    }
}
