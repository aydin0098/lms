<?php

namespace Aydin0098\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Aydin0098\User\Http\Requests\ResetPasswordVerifyRequest;
use Aydin0098\User\Http\Requests\sendResetPasswordVerifyRequest;
use Aydin0098\User\Http\Requests\VerifyCodeRequest;
use Aydin0098\User\Models\User;
use Aydin0098\User\Repositories\UserRepo;
use Aydin0098\User\Services\VerifyCodeService;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showVerifyCodeRequestForm()
    {
        return view('User::Front.passwords.email');
    }

    public function sendVerifyCodeEmail(sendResetPasswordVerifyRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);
        if ($user && !VerifyCodeService::has($user->id)){
            $user->sendResetPasswordRequestNotification();
        }
        return view('User::Front.passwords.enter-verify-code-form');

    }

    public function checkVerifyCode(ResetPasswordVerifyRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);

        if ($user == null || ! VerifyCodeService::check($user->id,$request->verify_code)){

            return back()->withErrors(['verify_code' => 'کد فعالسازی اشتباه می باشد']);
        }
        auth()->loginUsingId($user->id);
        return redirect()->route('password.showResetForm');

    }

}
