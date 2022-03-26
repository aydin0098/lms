<?php

namespace Aydin0098\RolePermissions\Repositories;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRepo
{
    public function all()
    {
        return Permission::all();

    }
}
