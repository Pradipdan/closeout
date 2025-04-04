<?php

namespace App\Repositories;

use App\Models\User;

class HomeRepository
{

    public function create($user_data)
    {
        $user = User::create($user_data);
        return $user;
    }
}
