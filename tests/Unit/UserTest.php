<?php

namespace Tests\Unit;

use App\Models\Profile;
use App\Models\Schedule;
use App\Models\User;
use Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_generate_a_path_for_each_user()
    {
        $user = make(User::class);

        $this->assertEquals('/employees/' . $user->id, $user->path());
    }

    /** @test */
    public function it_automatically_hash_the_password_when_persisting()
    {
        $user = make(User::class, ['password' => '12345']);

        $isHashed = Hash::check('12345', $user->password);

        $this->assertTrue($isHashed);
    }

    /** @test */
    public function it_can_have_a_profile()
    {
        $user = create(User::class);

        create(Profile::class, ['user_id' => $user->id]);

        $this->assertInstanceOf(Profile::class, $user->profile);
    }

    /** @test */
    public function it_can_display_the_full_name_of_the_user()
    {
        $user = make(User::class, ['first_name' => 'John', 'last_name' => 'Doe']);

        $this->assertEquals('John Doe', $user->name());
    }

    /** @test */
    public function it_can_fetch_all_users_that_are_of_the_same_company_as_the_signed_in_admin()
    {
        $this->signIn($admin = create(User::class, ['type' => 'Admin']));
        create(User::class, ['company_id' => $admin->company_id]);
        create(User::class);

        $users = User::sameCompany()->get();

        $this->assertEquals(2, $users->count());
    }

    /** @test */
    public function it_has_a_schedule()
    {
        $this->signIn($user = create(User::class));
        create(Schedule::class, ['user_id' => $user->id]);

        $schedule = $user->schedule;

        $this->assertInstanceOf(Schedule::class, $schedule);
    }
}
