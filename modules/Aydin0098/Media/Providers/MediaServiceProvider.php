<?php
namespace Aydin0098\Media\Providers;

use Aydin0098\RolePermissions\Database\Seeders\RolePermissionSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/media_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Media');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadFactoriesFrom(__DIR__.'/../Database/Factories');
        $this->loadJsonTranslationsFrom(__DIR__.'/../Lang');
        $this->loadTranslationsFrom(__DIR__.'/../Lang/','Media');
    }

    public function boot()
    {
        config()->set('sidebar.items.courses',[
            "icon" => 'i-courses',
            'title' => 'دوره ها',
            'url' => route('courses.index')
        ]);






    }

}
