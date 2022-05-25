<?php
namespace Aydin0098\Course\Providers;

use Aydin0098\Course\Models\Course;
use Aydin0098\Course\Policies\CategoryPolicy;
use Aydin0098\Course\Policies\CoursePolicy;
use Aydin0098\RolePermissions\Database\Seeders\RolePermissionSeeder;
use Aydin0098\RolePermissions\Models\Permission;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/course_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Course');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadFactoriesFrom(__DIR__.'/../Database/Factories');
        $this->loadJsonTranslationsFrom(__DIR__.'/../Lang');
        $this->loadTranslationsFrom(__DIR__.'/../Lang/','Course');
        DatabaseSeeder::$seeders[] =  RolePermissionSeeder::class;
        Gate::policy(Course::class,CoursePolicy::class);
        Gate::before(function ($user){
            return $user->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN) ? true : null;
        });
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
