<?php

namespace Tests\Feature;

use App\Models\User;
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

        $this->user = create(User::class);

        $this->admin = create(User::class, ['type' => 'Admin']);

        $this->employee = create(User::class, ['type' => 'Employee']);
    }

    /** @test */
    public function an_admin_can_view_all_employees_from_the_same_company_only()
    {
        $this->signIn($this->admin);

        $response = $this->get('/employees');

        $response->assertStatus(200);
        $response->assertSee($this->admin->first_name);
        $response->assertDontSee($this->employee->first_name);
    }

    /** @test */
    public function an_admin_can_view_any_employee_profile_from_the_same_company()
    {
        $this->signIn($this->admin);
        $employee = create(User::class, ['company_id' => $this->admin->company_id]);

        $response = $this->get($employee->path());

        $response->assertStatus(200);
        $response->assertSee($employee->first_name);
    }

    /** @test */
    public function a_user_may_not_view_employee_profile_from_other_company()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->employee);

        $this->get($this->user->path());
    }

    /** @test */
    public function an_employee_cannot_view_all_employees()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->employee);

        $this->get('/employees');
    }

    /** @test */
    public function an_employee_can_view_his_or_her_profile()
    {
        $this->signIn($this->employee);

        $response = $this->get($this->employee->path());

        $response->assertStatus(200);
        $response->assertSee($this->employee->first_name);
    }

    /** @test */
    public function an_employee_cannot_view_other_employees_profile()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->employee);

        $this->get($this->user->path());
    }

//    /** @test */
//    public function it_throws_404_when_viewing_an_employee_that_does_not_exists()
//    {
//        $this->signIn($this->admin);
//
//        $response = $this->get('/employees/103213');
//
//        $response->assertStatus(404);
//    }
}
