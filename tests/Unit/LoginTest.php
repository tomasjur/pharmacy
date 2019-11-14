<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase //vendor\bin\phpunit tests\Unit\LoginTest.php
{
    // 5
    public function test_user_can_view_a_login_form() // Can view a login form
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
    public function test_user_cannot_view_login_form_when_logged_in() // Cannot view login form when already logged in
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get(route('login'));
        $response->assertRedirect(route('home'));
    }
    public function test_user_cannot_login_with_incorrect_email() // Cannot login with incorrect email
    {
        $response = $this->from(route('login'))->post(route('login'), [
            'email' => 'wrong@email.com',
            'password' => 'password999',
        ]);
        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
    public function test_user_cannot_login_with_incorrect_password() // Cannot login with incorrect password
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('good-password'),
        ]);
        $response = $this->from(route('login'))->post(route('login'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
    public function test_user_can_login_with_correct_credentials() // Can login with correct credentials
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('login');

        $response->assertRedirect('/home');
    }
}
