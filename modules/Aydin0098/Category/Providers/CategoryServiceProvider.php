<?php
namespace Aydin0098\Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/categories_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Category');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadFactoriesFrom(__DIR__.'/../Database/Factories');

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
