<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Aydin0098\User\Http\Controllers' , 'middleware' => 'web'],function ($router){

//    Auth::routes(['verify' => true]);

    Route::post('/email/verify',[\Aydin0098\User\Http\Controllers\Auth\VerificationController::class,'verify'])->name('verification.verify');
    Route::post('/email/resend',[\Aydin0098\User\Http\Controllers\Auth\VerificationController::class,'resend'])->name('verification.resend');
    Route::get('/email/verify',[\Aydin0098\User\Http\Controllers\Auth\VerificationController::class,'show'])->name('verification.notice');

    //login
    Route::get('/login',[\Aydin0098\User\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[\Aydin0098\User\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
    //logout
    Route::get('/logout',[\Aydin0098\User\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
    //Reset Password
    Route::get('/password/reset', [\Aydin0098\User\Http\Controllers\Auth\ForgotPasswordController::class,'showVerifyCodeRequestForm'])
        ->name('password.request');
    Route::get('/password/reset/send', [\Aydin0098\User\Http\Controllers\Auth\ForgotPasswordController::class,'sendVerifyCodeEmail'])
        ->name('password.sendVerifyCodeEmail');
    Route::post('/password/reset/check-verify-code', [\Aydin0098\User\Http\Controllers\Auth\ForgotPasswordController::class,'checkVerifyCode'])
        ->name('password.checkVerifyCode')->middleware('throttle:5,1');

    Route::get('/password/change',[\Aydin0098\User\Http\Controllers\Auth\ResetPasswordController::class,'showResetForm'])
        ->name('password.showResetForm')->middleware('auth');
    Route::post('/password/change',[\Aydin0098\User\Http\Controllers\Auth\ResetPasswordController::class,'reset'])->name('password.update');



    Route::get('/password/email',[\Aydin0098\User\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');

    //Register
    Route::get('/register',[\Aydin0098\User\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
    Route::post('/register',[\Aydin0098\User\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');

});


