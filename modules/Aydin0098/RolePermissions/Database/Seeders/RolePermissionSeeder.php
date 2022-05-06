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
        Permission::findOrCreate( 'manage categories');
        Permission::findOrCreate( 'manage role_permissions');
        Permission::findOrCreate( 'manage courses');
        Permission::findOrCreate( 'teach');

        Role::findOrCreate('teacher')->givePermissionTo(['teach']);
    }
}
