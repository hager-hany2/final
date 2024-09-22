<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Str;

class DeleteItemController extends Controller
{
    public function delete()
    {

        if (request()->filled('model_name') && request()->filled('id')) {
            $item = ('App\Models\\' . request('model_name'))::query()->find(request('id'));
            if ($item != null) {
                $item->delete();
                return redirect()->back();
            }

        }
    }

}
