<?php

namespace Tests\Unit;

use App\Models\Profile;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_generate_a_path_for_each_user()
    {
        $user = factory(User::class)->create(['id' => 1]);

        $this->assertEquals('/employees/1', $user->path());
    }

    /** @test */
    public function it_can_have_a_profile()
    {
        $user = factory(User::class)->create();

        factory(Profile::class)->create(['user_id' => $user->id]);

        $this->assertInstanceOf(Profile::class, $user->profile);
    }
}
