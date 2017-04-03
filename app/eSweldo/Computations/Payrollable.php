<?php

namespace App\eSweldo\Computations;

use App\Models\Attendance;
use App\Models\PayPeriod;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

trait Payrollable
{
    /**
     * Payroll of the user from a pay period
     *
     * @param PayPeriod $payPeriod
     * @return Payroll
     */
    public function payroll(PayPeriod $payPeriod)
    {
        /** @var User $this */
        return (new Payroll($this))->handle($payPeriod);
    }

    /**
     * Regular working hours from a certain period
     *
     * @param $start_date
     * @param $end_date
     * @return float|int
     */
    public function regularHours($start_date, $end_date)
    {
        $attendances = Attendance::where('user_id', $this->id)
            ->from($start_date)
            ->to($end_date)
            ->get();

        /** @var Collection $attendances */
        return $attendances->reduce(function ($carry, $attendance) {
                /** @var Attendance $attendance */
                return $carry + $attendance->regularHours();
            }, 0) / 60;
    }

    /**
     * Over time working hours from a certain period
     *
     * @param $start_date
     * @param $end_date
     * @return float|int
     */
    public function overTimeHours($start_date, $end_date)
    {
        $attendances = Attendance::where('user_id', $this->id)
            ->from($start_date)
            ->to($end_date)
            ->get();

        /** @var Collection $attendances */
        return $attendances->reduce(function ($carry, $attendance) {
                /** @var Attendance $attendance */
                return $carry + $attendance->overTime();
            }, 0) / 60;
    }

    public function regularHolidayHours($start_date, $end_date)
    {
        $attendances = Attendance::where('user_id', $this->id)
            ->from($start_date)
            ->to($end_date)
            ->get();

        /** @var Collection $attendances */
        return $attendances->reduce(function ($carry, $attendance) {
                /** @var Attendance $attendance */
                if ($attendance->isRegularHoliday()) {
                    return $carry + $attendance->regularHours();
                }

                return 0;
            }, 0) / 60;
    }

    public function specialHolidayHours($start_date, $end_date)
    {
        $attendances = Attendance::where('user_id', $this->id)
            ->from($start_date)
            ->to($end_date)
            ->get();

        /** @var Collection $attendances */
        return $attendances->reduce(function ($carry, $attendance) {
                /** @var Attendance $attendance */
                if ($attendance->isSpecialHoliday()) {
                    return $carry + $attendance->regularHours();
                }

                return 0;
            }, 0) / 60;
    }
}
