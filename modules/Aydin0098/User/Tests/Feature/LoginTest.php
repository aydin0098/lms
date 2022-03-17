<?php

namespace Aydin0098\User\Tests\Feature;

use Aydin0098\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_by_email()
    {
        $user = User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => bcrypt('123456789')
        ]);
        $this->post(route('login'),[
            'email' => $user->email,
            'password' => '123456789'
        ]);
        $this->assertAuthenticated();
    }
    public function test_user_can_login_by_mobile()
    {
        $user = User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'mobile' => '09398933139',
            'password' => bcrypt('123456789')
        ]);
        $this->post(route('login'),[
            'email' => $user->mobile,
            'password' => '123456789'
        ]);
        $this->assertAuthenticated();
    }
}
