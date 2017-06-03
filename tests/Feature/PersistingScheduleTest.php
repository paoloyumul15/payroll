<?php

namespace Tests\Feature;

use App\Models\Schedule;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PersistingScheduleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function an_admin_user_can_see_the_form_to_create_a_schedule()
    {
        $user = $this->signIn(create(User::class, ['type' => 'Admin']));

        $response = $this->get('/schedules/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_employee_user_cannot_see_the_form_to_create_a_schedule()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $user = $this->signIn(create(User::class, ['type' => 'Employee']));

        $response = $this->get('/schedules/create');
    }

    /** @test */
    public function an_employee_user_cannot_add_a_schedule()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $user = $this->signIn(create(User::class, ['type' => 'Employee']));
        $schedule = make(Schedule::class, ['company_id' => $user->company_id])->toArray();

        $response = $this->post('/schedules', $schedule);
    }

    /** @test */
    public function an_admin_user_can_add_a_schedule()
    {
        $user = $this->signIn(create(User::class, [
            'schedule_id' => null,
            'type' => 'Admin',
        ]));

        $schedule = make(Schedule::class, [
            'monday' => ['start' => '9:00:00', 'end' => '17:00:00'],
        ])->toArray();

        $response = $this->post('/schedules', $schedule);

        $response->assertStatus(302);
        $this->assertEquals(1, Schedule::count());
    }

    public function an_admin_can_assign_a_schedule_to_an_employee()
    {
        // TODO: TEST
    }
}
