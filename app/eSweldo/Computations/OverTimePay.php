<?php

namespace App\eSweldo\Computations;

class OverTimePay extends Computation
{
    const RATE_MULTIPLIER = 1.25;

    /**
     * Specify the type of the computation: 'earning'|'deduction'
     *
     * @return string
     */
    public function type()
    {
        return 'earning';
    }

    /**
     * Computations of the earning or deduction
     *
     * @return mixed
     */
    public function compute()
    {
        return (float) ($this->user->profile->rate * $this->user->overTimeHours($this->startDate, $this->endDate)) * self::RATE_MULTIPLIER;
    }
}
