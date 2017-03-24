<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeesPolicy
{
    use HandlesAuthorization;

    /**
     * Only admins can view all employees
     * @return bool
     */
    public function index()
    {
        return auth()->user()->type === 'Admin';
    }

    /**
     * Only admin and the profile's owner can view the profile
     * @param User $user
     * @param User $employee
     * @return bool
     */
    public function show(User $user = null, User $employee)
    {
        return $user->type === 'Admin' || $user->id == $employee->id;
    }

    /**
     * Only admins can view the create form for employees
     * @return bool
     */
    public function create()
    {
        return auth()->user()->type === 'Admin';
    }

    /**
     * Only admins can store new employee in the database
     * @return bool
     */
    public function store()
    {
        return auth()->user()->type === 'Admin';
    }

    /**
     * Only admins can store new employee in the database
     * @return bool
     */
    public function delete()
    {
        return auth()->user()->type === 'Admin';
    }
}
