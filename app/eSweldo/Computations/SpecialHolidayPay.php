<?php

namespace App\eSweldo\Computations;


class SpecialHolidayPay extends Computation
{

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
        return ($this->user->profile->rate * 1.3) * $this->user->specialHolidayHours($this->startDate, $this->endDate);
    }
}
