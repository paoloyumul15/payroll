<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewingScheduleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_user_can_view_all_schedules()
    {
        $this->signIn(create(User::class));

        $response = $this->get('/schedules');

        $response->assertStatus(200);
    }
}
