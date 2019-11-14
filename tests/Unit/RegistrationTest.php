<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class RegistrationTest extends TestCase //vendor\bin\phpunit tests\Unit\RegistrationTest.php
{
    // 6
    public function test_user_can_view_a_register_form() // Can view a register form
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }
    public function test_user_cannot_view_registration_form_when_logged_in() // Cannot view registration form when logged in
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get(route('register'));
        $response->assertRedirect(route('home'));
    }
    public function test_user_cannot_register_without_name() // Cannot register without name
    {
        $response = $this->from(route('register'))->post(route('register'), [
            'name' => '',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('name');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
    public function test_user_cannot_register_with_invalid_email() // Cannot register with invalid email
    {
        $response = $this->from(route('register'))->post(route('register'), [
            'name' => 'Jonas',
            'email' => 'invalid-email',
            'password' => 'testingpassword',
            'password_confirmation' => 'testingpassword',
        ]);
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
    public function test_user_cannot_register_without_password_confirmation() // Cannot register without password confirmation
    {
        $response = $this->from(route('register'))->post(route('register'), [
            'name' => 'Andrius',
            'email' => 'john@example.com',
            'password' => 'testingpassword',
            'password_confirmation' => '',
        ]);
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
    public function test_user_can_register_successfully() // Can register successfully
    {
        /*$user = [
            'name' => 'Test3',
            'email' => 'test3@test.com',
            'password' => 'test12345',
            'password_confirmation' => 'test12345'
        ];*/
        $user = factory(User::class)->create();

        $response = $this->post('/register', $user);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('users', $user);
    }
}
// https://medium.com/@DCzajkowski/testing-laravel-authentication-flow-573ea0a96318
// https://github.com/DCzajkowski/auth-tests/tree/master/src/Console/stubs/tests/Feature/Auth
