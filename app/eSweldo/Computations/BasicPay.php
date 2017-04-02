<?php

namespace App\eSweldo\Computations;

use App\Models\PayPeriod;

class BasicPay extends Computation
{
    public function type()
    {
        return 'earning';
    }

    public function compute(PayPeriod $payPeriod)
    {
        $user = $this->user;
        $start_date = $payPeriod->start_date->format('Y-m-d H:i:s');
        $end_date = $payPeriod->end_date->format('Y-m-d H:i:s');

        return (float) $user->profile->rate * $user->regularHours($start_date, $end_date);
    }
}
