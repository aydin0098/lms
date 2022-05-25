<?php

namespace Aydin0098\User\Repositories;

use Aydin0098\RolePermissions\Models\Permission;
use Aydin0098\User\Models\User;

class UserRepo
{
    public function findByEmail($email)
    {
        return User::where('email',$email)->first();

    }

    public function getTeachers()
    {
        return User::permission(Permission::PERMISSION_TEACH)->get();

    }

    public function findById($id)
    {
        return User::find($id);

    }

}
