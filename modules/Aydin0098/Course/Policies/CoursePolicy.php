<?php

namespace Aydin0098\Course\Policies;

use Aydin0098\RolePermissions\Models\Permission;
use Aydin0098\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function Manage(User $user)
    {

        return $user->hasPermissionTo(Permission::PERMISSION_MANAGE_COURSES);
    }
}
