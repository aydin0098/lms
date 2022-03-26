<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Aydin0098\Category\Http\Controllers','middleware' => ['web','auth','verified']],function ($router){

   $router->resource('dashboard/categories', \Aydin0098\Category\Http\Controllers\CategoryController::class)
   ->middleware('permission:manage categories');

});



