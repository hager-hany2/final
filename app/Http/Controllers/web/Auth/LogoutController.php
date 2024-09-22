<?php

namespace App\Http\Controllers\web\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout_system()
    {
        if (auth()->check()) {
            auth()->logout();
        }
        return redirect('/sigin');
    }
}
