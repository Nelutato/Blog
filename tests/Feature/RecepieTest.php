<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\User;

class RecepieTest extends TestCase
{    
    use WithFaker;


    public function test_recepie_response()
    {
        $response = $this->get('/Recepies/Recepie');

        $response->assertStatus(200);
    }
    public function test_user_can_enter_create_form()
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/Recepies/Recepie/create');

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }
    public function test_create_recepie()
    {
        $user = User::factory()->make();
        $image = $this->faker->image('public/images',640,480, null, false);

        $response = $this->actingAs($user)->get('Recepies/Recepie/create',$array =[
            'body' => Str::random(20),
            'title' => Str::random(10),
            'ingredients' => Str::random(5),
            'image' => $image,
        ]);
        
        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }
    public function test_guest_cant_create_recepie()
    {
        $response = $this->get('/Recepies/Recepie/create');
        $image = $this->faker->image('public/images',640,480, null, false);

        $response = $this->get('Recepies/Recepie/create',$array =[
            'body' => Str::random(20),
            'title' => Str::random(10),
            'ingredients' => Str::random(5),
            'image' => $image,
        ]);
        
        $response->assertStatus(302);
        $this->assertGuest();
    }
}
