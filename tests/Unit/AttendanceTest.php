<?php

namespace Test\Unit;

use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AttendanceTest extends TestCase
{
    use DatabaseTransactions;

    private $attendanceWithUnderTime;

    private $attendanceWithOverTime;

    public function setUp()
    {
        parent::setUp();

        $user = create(User::class);

        $schedule = create(Schedule::class);

        $this->attendanceWithOverTime = create(Attendance::class, [
            'user_id' => $user->id,
            'schedule_id' => $schedule->id,
            'date' => date('Y-m-d'),
            'time_in' => '09:56:00',
            'time_out' => '21:47:00',
        ]);

        $this->attendanceWithUnderTime = create(Attendance::class, [
            'user_id' => $user->id,
            'schedule_id' => $schedule->id,
            'date' => carbon(date('Y-m-d'))->addDay(),
            'time_in' => '09:56:00',
            'time_out' => '17:43:00',
        ]);
    }

    /** @test */
    public function it_can_compute_the_number_of_minutes_late()
    {
        $lateInMinutes = $this->attendanceWithOverTime->late();

        $this->assertEquals(116, $lateInMinutes);
    }

    /** @test */
    public function it_can_compute_the_number_of_minutes_overtime()
    {
        $overTimeInMinutes = $this->attendanceWithOverTime->overTime();

        $this->assertEquals(227, $overTimeInMinutes);
    }

    /** @test */
    public function it_can_compute_the_full_regular_hours_in_minutes()
    {
        $regularHoursInMinutes = $this->attendanceWithOverTime->regularHours();

        $this->assertEquals(484, $regularHoursInMinutes);
    }

    /** @test */
    public function it_can_compute_the_right_regular_hours_when_the_employee_is_under_time_in_minutes()
    {
        $regularHoursInMinutes = $this->attendanceWithUnderTime->regularHours();

        $this->assertEquals(467, $regularHoursInMinutes);
    }

    /** @test */
    public function it_can_compute_the_number_of_minutes_under_time()
    {
        $underTimeInMinutes = $this->attendanceWithUnderTime->underTime();

        $this->assertEquals(17, $underTimeInMinutes);
    }
}
