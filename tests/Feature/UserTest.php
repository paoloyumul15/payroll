<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_admin_can_view_all_employees()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/employees');

        $response->assertStatus(200);
        $response->assertSee($user->first_name);
    }

    /** @test */
    public function an_admin_can_view_specific_employee()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/employees/'.$user->id);

        $response->assertStatus(200);
        $response->assertSee($user->first_name);
    }
}
