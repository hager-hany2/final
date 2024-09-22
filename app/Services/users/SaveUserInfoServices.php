<?php

namespace App\Services\users;

use App\Models\product;
use App\Models\User;

class SaveUserInfoServices
{
    public static function save($data, $id = null)
    {
        return user::query()->updateOrCreate(
            ['id' => $id],
            $data
        );
    }

}
