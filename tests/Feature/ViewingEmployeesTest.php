<?php

namespace Tests\Feature;

use App\Models\User;
use Exception;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ViewingEmployeesTest extends TestCase
{
    use DatabaseTransactions;

    private $user;
    private $admin;
    private $employee;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->admin = factory(User::class)->create(['type' => 'Admin']);
        $this->employee = factory(User::class)->create(['type' => 'Employee']);
    }

    /** @test */
    public function an_admin_can_view_all_employees()
    {
        $this->signIn($this->admin);

        $response = $this->get('/employees');

        $response->assertStatus(200);
        $response->assertSee($this->user->first_name);
    }

    /** @test */
    public function an_admin_can_any_employee_profile()
    {
        $this->signIn($this->admin);

        $response = $this->get($this->user->path());

        $response->assertStatus(200);
        $response->assertSee($this->user->first_name);
    }

    /**
     * @expectedException Exception
     * @test
     */
    public function an_employee_cannot_view_all_employees()
    {
        $this->signIn($this->employee);


        $response = $this->get('/employees');

        $response->assertStatus(403);
    }

    /** test */
    public function an_employee_can_view_his_or_her_profile()
    {
        $this->signIn($this->employee);

        $response = $this->get($this->employee->path());

        $response->assertStatus(200);
    }

    /**
     * @expectedException Exception
     * @test
     */
    public function an_employee_cannot_view_other_employees_profile()
    {
        $this->signIn($this->employee);

        $response = $this->get($this->user->path());

        $response->assertStatus(403);
    }
}
