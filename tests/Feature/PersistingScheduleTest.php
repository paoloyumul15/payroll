<?php

namespace Tests\Feature;

use App\Models\Schedule;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function var_dump;

class PersistingScheduleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function an_employee_user_can_add_a_schedule()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $user = $this->signIn(create(User::class));
        $schedule = make(Schedule::class, ['user_id' => $user->id])->toArray();

        $response = $this->post('/schedules', $schedule);

        $response->assertStatus(404);
    }


    /** @test */
    public function an_admin_user_can_add_a_schedule()
    {
        $user = $this->signIn(create(User::class, ['type' => 'Admin']));

        $schedule = make(Schedule::class, ['user_id' => $user->id])->toArray();

        $response = $this->post('/schedules', $schedule);

        $response->assertStatus(200);
        $this->assertDatabaseHas('schedules', ['user_id' => $user->id]);
    }
}
