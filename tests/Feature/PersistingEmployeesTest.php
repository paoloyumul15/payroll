<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PersistingEmployeesTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    protected $admin;

    protected $employee;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->admin = factory(User::class)->create(['type' => 'Admin']);

        $this->employee = factory(User::class)->create(['type' => 'Employee']);
    }

    /** @test */
    public function employees_are_not_allowed_to_see_the_create_form_for_employees()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->employee);

        $this->get('/employees/create');
    }

    /** * @test */
    public function only_admin_can_see_the_create_form_of_employees()
    {
        $this->signIn($this->admin);

        $response = $this->get('/employees/create');

        $response->assertStatus(200);
        $response->assertSee('Add Employee');
    }

    /** * @test */
    public function only_admin_can_store_employees_detail()
    {
        $this->signIn($this->admin);
        $user = factory(User::class)->make();
        $profile = factory(Profile::class)->make();

        $response = $this->post('/employees',
            $profile->toArray() +
            $user->toArray() +
            ['password' => bcrypt('p@ssw0rd')]
        );

        $this->assertDatabaseHas('users', ['first_name' => $user->first_name]);
        $this->assertDatabaseHas('profiles', ['sss_number' => $profile->sss_number]);
        $response->assertStatus(302);
    }
}
