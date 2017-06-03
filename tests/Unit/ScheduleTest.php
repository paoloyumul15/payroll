<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_a_company()
    {
        $schedule = create(Schedule::class);

        $this->assertInstanceOf(Company::class, $schedule->company);
    }

    /** @test */
    public function it_only_fetches_the_schedule_of_the_same_company()
    {
        $user = $this->signIn(create(User::class, ['schedule_id' => null]));
        create(Schedule::class, ['company_id' => $user->company_id]);
        create(Schedule::class);

        $schedules = Schedule::all();

        $this->assertEquals(1, $schedules->count());
    }
}
