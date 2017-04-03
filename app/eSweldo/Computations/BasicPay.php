<?php

namespace App\eSweldo\Computations;

class BasicPay extends Computation
{
    public function type()
    {
        return 'earning';
    }

    public function compute()
    {
        return (float) $this->user->profile->rate * $this->user->regularHours($this->startDate, $this->endDate);
    }
}
