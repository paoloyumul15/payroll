<?php

namespace App\eSweldo\Computations;

use App\Models\PayPeriod;
use App\Models\User;

abstract class Computation
{
    protected $user;

    protected $startDate;

    protected $endDate;

    public function __construct(User $user, PayPeriod $payPeriod)
    {
        $this->user = $user;

        $this->startDate = $payPeriod->start_date->format('Y-m-d H:i:s');

        $this->endDate = $payPeriod->end_date->format('Y-m-d H:i:s');
    }

    /**
     * Specify the type of the computation: 'earning'|'deduction'
     *
     * @return string
     */
    public abstract function type();

    /**
     * Computations of the earning or deduction
     *
     * @return mixed
     */
    public abstract function compute();
}
