<?php

namespace App\Http\Service;

use App\Models\User;

class UserService
{
    public function getDetails(): User|null
    {
        $res = null;
        if (auth()->id()) {
            $res = User::find(auth()->id());
        }
        return $res;
    }
}
