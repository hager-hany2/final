<?php

namespace App\Services\Admin;

use App\Models\User;

class SaveAdminInfoServices
{
    public static function save($data, $id = null)
    {
        return user::query()->updateOrCreate(
            ['id' => $id],
            $data
        );
    }

}
