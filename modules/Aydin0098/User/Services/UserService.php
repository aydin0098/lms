<?php

namespace Aydin0098\User\Services;

use Illuminate\Support\Facades\Hash;

class UserService
{

    public static function changePassword($user , $newPassword)
    {
        $user->update([
            'password' => Hash::make($newPassword)
        ]);

    }

}
