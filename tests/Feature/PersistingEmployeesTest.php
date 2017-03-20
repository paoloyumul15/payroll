<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\User;
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

        $this->user = factory(User::class)->create(['id' => 1]);
        $this->admin = factory(User::class)->create(['id' => 2, 'type' => 'Admin']);
        $this->employee = factory(User::class)->create(['id' => 3,'type' => 'Employee']);
    }

    /**
     * @expectedException Exception
     * @test
     */
    public function employees_are_not_allowed_to_see_the_create_form_for_employees()
    {
        $this->signIn($this->employee);

        $response = $this->get('/employees/create');

        $response->assertStatus(403);
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
        $user = factory(User::class)->make(['id' => 4]);
        $profile = factory(Profile::class)->make(['user_id' => 4]);

        $response = $this->post('/employees',
            $profile->toArray() +
            $user->toArray() +
            ['password' => bcrypt('p@ssw0rd')]
        );

        $this->assertDatabaseHas('users', ['id' => 4]);
        $this->assertDatabaseHas('profiles', ['user_id' => 4]);
        $response->assertStatus(302);
    }
}
