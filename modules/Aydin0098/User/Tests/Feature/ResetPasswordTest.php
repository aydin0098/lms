<?php

namespace Aydin0098\User\Tests\Feature;

use Aydin0098\User\Models\User;
use Aydin0098\User\Services\VerifyCodeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_reset_password_request_form()
    {
        $response = $this->get(route('password.request'));

        $response->assertStatus(200);
    }

    public function test_user_can_see_enter_verify_code_by_correct_email()
    {
        $this->call('get',route('password.sendVerifyCodeEmail'),['email'=>'test@gmail.com'])->assertOk();

    }
    public function test_user_cannot_see_enter_verify_code_by_wrong_email()
    {
        $this->call('get',route('password.sendVerifyCodeEmail'),['email'=>'test.com'])->assertStatus(302);

    }

    public function test_user_banned_after_6_attempt_to_reset_password()
    {
        for ($i=0;$i<5;$i++){
            $this->post(route('password.checkVerifyCode'),['verify_code','email'=>'test@gmail.com'])->assertStatus(302);
        }
        $this->post(route('password.checkVerifyCode'),['verify_code','email'=>'test@gmail.com'])->assertStatus(429);


    }



}
