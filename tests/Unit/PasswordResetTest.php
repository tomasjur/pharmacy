<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetTest extends TestCase //vendor\bin\phpunit tests\Unit\PasswordResetTest.php
{
    public function test_user_can_view_password_reset_form() // User can see password reset form
    {
        $user = factory(User::class)->create();
        $token = route('password.reset', Password::broker()->createToken($user));
        $response = $this->get($token);
        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.reset');
        $response->assertViewHas('token', $token);
    }
}
