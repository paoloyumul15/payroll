<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UpdatingEmployeesTest extends TestCase
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
    public function employees_are_not_allowed_to_see_the_edit_form_in_employees_module()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->employee);

        $this->get($this->employee->path() . '/edit');
    }

    /** @test */
    public function employees_are_not_allowed_to_update_an_employee()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->employee);

        $this->patch($this->employee->path());
    }

    /** @test */
    public function admin_can_update_employees_from_the_same_company()
    {
        $this->signIn($this->admin);
        $employee = create(User::class, ['company_id' => $this->admin->company_id]);

        $this->patch($employee->path(), ['email' => 'johndoe@example.com']);

        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']);
    }

    /** @test */
    public function admin_cannot_update_employees_profile_from_other_company()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->admin);

        $this->patch($this->employee->path());
    }

//    /** @test */
//    public function admin_may_see_the_edit_form_in_employees_module()
//    {
//        $this->signIn($this->admin);
//        $employee = create(User::class, ['company_id' => $this->admin->company_id]);
//
//        $response = $this->get($employee->path() . '/edit');
//        $response->assertStatus(200);
//    }
}
