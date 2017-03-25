<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DeletingEmployeesTest extends TestCase
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
    public function employees_are_not_allowed_to_delete_an_employee()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->employee);

        $this->delete($this->user->path());
    }

    /** @test */
    public function admins_can_delete_employees_from_the_same_company()
    {
        $this->signIn($this->admin);

        $employee = create(User::class, ['company_id' => $this->admin->company_id]);

        $this->delete($employee->path());

        $this->assertDatabaseMissing('users', ['id' => $employee->id]);
    }

    /** @test */
    public function admins_cannot_delete_employees_from_other_company()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn($this->admin);

        $this->delete($this->employee->path());
    }
}
