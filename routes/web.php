<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});

Route::get('/verify-link/{user}',function (){
    if (request()->hasValidSignature()){
        return 'ok';
    }

    return 'failed';

})->name('verify.link');

Route::get('/test',function (){
    return new \Aydin0098\User\Mail\VerifyCodeMail(11111);
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
