<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class EmployeesTest extends TestCase //vendor\bin\phpunit tests\Unit\EmployeesTest.php
{
    public function test_user_can_see_employees() // User can see employees page when logged in
    {
        $user = factory(User::class)->make();

        $route = route('employee');
        $response = $this->actingAs($user)->get($route);

        $response->assertSuccessful();
        //$response->assertViewIs('/employee');
        $response->assertSee('/employee');
    }
    public function test_user_cannot_see_employees_when_not_logged_in() // Cannot see employees when not logged in
    {
        $response = $this->get('/employee');
        $response->assertRedirect('/login');
    }
    /*public function test_user_can_see_add_form() // Can see add employee page
    {
        $response = $this->get(route('add-employee'));

        $response->assertSuccessful();
        $response->assertSee('add-employee');
    }*/
}
