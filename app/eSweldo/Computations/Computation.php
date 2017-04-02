<?php

namespace App\eSweldo\Computations;

use App\Models\PayPeriod;
use App\Models\User;

abstract class Computation
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Specify the type of the computation: 'earning'|'deduction'
     *
     * @return string
     */
    public abstract function type();

    /**
     * Compute based on pay period
     *
     * @param PayPeriod $payPeriod
     * @return mixed
     */
    public abstract function compute(PayPeriod $payPeriod);
}
