<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserLoginTest extends TestCase
{

    public function test_login_form()
    {
        $response = $this->get('/user/login');
        $response->assertStatus(200);
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/user/login');
        $response->assertRedirect('/home');
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('user/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/user');
        $this->assertAuthenticatedAs($user);
    }
}
