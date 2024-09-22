<?php

namespace App\Http\Controllers\web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\user;

class ShowUsersController extends Controller
{
    public function users()
    {
        $users = user::query()->orderBy('id', 'DESC')->paginate(4);
        $data = UserResource::collection($users);
        return view('Admin.ShowUsers')->with(['data' => $users]);
    }
}
