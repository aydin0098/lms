<?php
namespace Aydin0098\RolePermissions\Providers;

use Aydin0098\RolePermissions\Database\Seeders\RolePermissionSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/rolePermissions_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','RolePermissions');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadFactoriesFrom(__DIR__.'/../Database/Factories');
        $this->loadJsonTranslationsFrom(__DIR__.'/../Lang');
        DatabaseSeeder::$seeders[] = RolePermissionSeeder::class;

    }

    public function boot()
    {
        config()->set('sidebar.items.role-permissions',[
            "icon" => 'i-user__inforamtion',
            'title' => 'نقش های کاربری',
            'url' => route('role-permissions.index')
        ]);






    }

}
