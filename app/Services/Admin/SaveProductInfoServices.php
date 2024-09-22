<?php

namespace App\Services\Admin;

use App\Models\product;
use App\Models\User;

class SaveProductInfoServices
{
    public static function save($data, $id = null)
    {
        return product::query()->updateOrCreate(
            ['id' => $id],
            $data
        );
    }

}
