<?php
namespace Aydin0098\Category\Providers;

use Aydin0098\Category\Database\Seeders\CategorySeeder;
use Aydin0098\Category\Models\Category;
use Aydin0098\Category\Policies\CategoryPolicy;
use Aydin0098\RolePermissions\Database\Seeders\RolePermissionSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/categories_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Category');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadFactoriesFrom(__DIR__.'/../Database/Factories');
        DatabaseSeeder::$seeders[] = CategorySeeder::class;
        Gate::policy(Category::class,CategoryPolicy::class);

    }

    public function boot()
    {
        config()->set('sidebar.items.categories',[
            "icon" => 'i-categories',
            'title' => 'دسته بندی ها',
            'url' => route('categories.index')
        ]);






    }

}
