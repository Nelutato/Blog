<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class UserRegisterTest extends TestCase
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register_form()
    {
        $response = $this->get('user/register');
        $this->assertTrue(true);
    }
    public function test_user_can_register()
    {
        $password="12345678";

        $response = $this->post('user/register', [
            'name' => $this->faker()->name(),
            'email' => $this->faker()->email(),
            'password' => $password,
            'password_confirmation' => $password,
        ]); 

        $response->assertRedirect('user');
        $this->assertAuthenticated();
    }
}
