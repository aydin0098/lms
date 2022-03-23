<?php

namespace Aydin0098\User\Repositories;

use Aydin0098\User\Models\User;

class UserRepo
{
    public function findByEmail($email)
    {
        return User::where('email',$email)->first();

    }

}
