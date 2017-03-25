<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeesPolicy
{
    use HandlesAuthorization;

    /**
     * Only admins can view all employees
     *
     * @return bool
     */
    public function index()
    {
        return auth()->user()->type === 'Admin';
    }

    /**
     * Only admin and the profile's owner can view the profile
     *
     * @param User $user
     * @param User $employee
     * @return bool
     */
    public function show(User $user = null, User $employee)
    {
        return ($user->type === 'Admin' || $user->id == $employee->id) && sameCompanyAs($employee);
    }

    /**
     * Only admins can view the create form for employees
     *
     * @return bool
     */
    public function create()
    {
        return auth()->user()->type === 'Admin';
    }

    /**
     * Only admins can store new employee in the database
     *
     * @return bool
     */
    public function store()
    {
        return auth()->user()->type === 'Admin';
    }

    /**
     * Only admins of the company can store new employee in the database
     *
     * @param User $user
     * @param User $employee
     * @return bool
     */
    public function delete(User $user = null, User $employee)
    {
        return auth()->user()->type === 'Admin' && sameCompanyAs($employee);
    }
}
