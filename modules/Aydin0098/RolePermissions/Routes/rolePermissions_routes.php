<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Aydin0098\RolePermissions\Http\Controllers','middleware' => ['web','auth','verified']],function ($router){

   $router->resource('dashboard/role-permissions', \Aydin0098\RolePermissions\Http\Controllers\RolePermissionController::class)
   ->middleware('permission:manage role_permissions');

});



