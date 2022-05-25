<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Aydin0098\Course\Http\Controllers','middleware' => ['web','auth','verified']],function ($router){

    $router->resource('dashboard/courses', \Aydin0098\Course\Http\Controllers\CourseController::class);
    $router->patch('dashboard/courses/{course}/accept',[\Aydin0098\Course\Http\Controllers\CourseController::class,'accept'])
        ->name('courses.accept');

    $router->patch('dashboard/courses/{course}/reject',[\Aydin0098\Course\Http\Controllers\CourseController::class,'reject'])
        ->name('courses.reject');

    $router->patch('dashboard/courses/{course}/lock',[\Aydin0098\Course\Http\Controllers\CourseController::class,'lock'])
        ->name('courses.lock');


});



