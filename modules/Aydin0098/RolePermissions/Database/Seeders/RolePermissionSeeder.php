<?php

namespace Aydin0098\RolePermissions\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\Aydin0098\RolePermissions\Models\Permission::$permissions as $permission)
        {
            Permission::findOrCreate( $permission);
        }

        foreach (\Aydin0098\RolePermissions\Models\Role::$roles as $name=>$permissions)
        {
            Role::findOrCreate($name)->givePermissionTo($permissions);
        }



    }
}
