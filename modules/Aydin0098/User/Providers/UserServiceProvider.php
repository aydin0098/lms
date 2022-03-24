<?php

namespace Aydin0098\User\Providers;

use Aydin0098\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    public function register()
    {
        config()->set('auth.providers.users.model',User::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/user_routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../Database/Factories');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','User');
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Aydin0098\User\Database\Factories\\' . class_basename($modelName) .'Factory' ;
        });


    }

}
