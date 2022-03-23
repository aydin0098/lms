<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Aydin0098\Dashboard\Http\Controllers','middleware' => ['web','auth','verified']],function ($router){

   $router->get('/dashboard', [\Aydin0098\Dashboard\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

});



