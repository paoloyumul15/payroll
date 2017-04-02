<?php

namespace App\eSweldo\Computations;

use App\Models\PayPeriod;
use App\Models\User;

class Payroll
{
    protected $user;

    protected $grossPay;

    protected $netPay;

    protected $totalDeductions;

    protected $computations = [
        'basicPay' => BasicPay::class,
    ];

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(PayPeriod $payPeriod)
    {
        /** @var Computation $computation */
        foreach ($this->computations as $tag => $computation) {
            $computation = new $computation($this->user);

            $this->$tag = $computation->compute($payPeriod);
        }

        return $this;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
