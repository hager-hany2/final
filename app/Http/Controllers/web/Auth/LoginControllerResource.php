<?php

namespace App\Http\Controllers\web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\Auth\LoginFormRequest;
use App\Http\Resources\UserResource;
use App\services\Message;
use Illuminate\Http\Request;

class LoginControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Auth.sigin');
    }

    public function save(LoginFormRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt($data)) {
            return redirect('welcome');
        } else {
            return redirect()->back()->withErrors(['error' => 'phone or password is not correct']);

        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
