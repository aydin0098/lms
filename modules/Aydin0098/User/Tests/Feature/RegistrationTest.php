<?php

namespace Aydin0098\User\Tests\Feature;

use Aydin0098\RolePermissions\Database\Seeders\RolePermissionSeeder;
use Aydin0098\User\Models\User;
use Aydin0098\User\Services\VerifyCodeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_register_form()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->registerNewUser();
        $response->assertRedirect(route('home'));

        $this->assertCount(1, User::all());

    }

    /**  @return void */

    public function test_use_have_to_verify_account()
    {
        $this->registerNewUser();
        $response = $this->get(route('home'));
        $response->assertRedirect(route('verification.notice'));

    }

    public function test_user_can_verify_account()
    {
        $user = User::create([
            'name' => 'aydin0098',
            'email' => 'aydin.s.hagighy1378@gmail.com',
            'mobile' => '09398933139',
            'password' => '123456789',
            'password_confirmation' => '123456789'
        ]);
        $code = VerifyCodeService::generate();
        VerifyCodeService::store($user->id,$code,now()->addDay());
        auth()->loginUsingId($user->id);
        $this->assertAuthenticated();

        $this->post(route('verification.verify'),[
            'verify_code' => $code
        ]);
        $this->assertEquals(true,$user->fresh()->hasVerifiedEmail());

    }

    public function test_verified_user_can_see_home_page()
    {
        $this->registerNewUser();
        $this->assertAuthenticated();
        auth()->user()->markEmailAsVerified();
        $response = $this->get(route('home'));
        $response->assertOk();

    }

    public function registerNewUser()
    {
        return $this->post(route('register'), [

            'name' => 'aydin0098',
            'email' => 'aydin.s.hagighy@gmail.com',
            'mobile' => '09398933139',
            'password' => Hash::make('123456789'),
            'password_confirmation' => '123456789'

        ]);
    }


}
