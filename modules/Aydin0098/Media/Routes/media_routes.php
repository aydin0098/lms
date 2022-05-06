<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Aydin0098\Course\Http\Controllers','middleware' => ['web','auth','verified']],function ($router){

   $router->resource('dashboard/courses', \Aydin0098\Course\Http\Controllers\CourseController::class)
   ->middleware('permission:manage courses');

});



