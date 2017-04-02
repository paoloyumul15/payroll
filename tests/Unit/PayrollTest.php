<?php

namespace Test\Unit;

use App\Models\Attendance;
use App\Models\PayPeriod;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PayrollTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_compute_the_basic_pay_of_the_employee()
    {
        $user = create(User::class);
        create(Profile::class, ['user_id' => $user->id, 'rate' => 100]);
        create(Schedule::class, ['user_id' => $user->id]);
        $payPeriod = create(PayPeriod::class, [
            'company_id' => $user->company_id,
            'start_date' => '2017-04-02 08:00:00',
            'end_date' => '2017-04-16 23:59:59',
            'pay_out_date' => '2017-04-16 23:59:59',
        ]);
        create(Attendance::class, [
            'user_id' => $user->id,
            'time_in' => '2017-04-02 08:00:00',
            'time_out' => '2017-04-02 18:00:00',
        ]);
        create(Attendance::class, [
            'user_id' => $user->id,
            'time_in' => '2017-04-02 08:00:00',
            'time_out' => '2017-04-02 18:00:00',
        ]);


        $payroll = $user->payroll($payPeriod);

        $this->assertEquals(2000, $payroll->basicPay);
    }
}
