<?php

namespace App\eSweldo\Computations;


class RegularHolidayPay extends Computation
{
    const RATE_MULTIPLIER = 2;

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
        return $this->rate() * $this->user->regularHolidayHours($this->startDate, $this->endDate);
    }

    public function rate()
    {
        return ($this->user->profile->rate * self::RATE_MULTIPLIER);
    }
}
