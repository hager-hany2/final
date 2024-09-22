<?php

namespace App\Http\Controllers\web\Auth;


use App\Actions\ImageModelSave;
use App\Http\Controllers\Controller;
use App\Http\Requests\web\Admin\AddAdminFromRequest;
use App\Http\Requests\web\Auth\RegisterFromRequest;
use App\Models\Register;
use App\Services\Admin\SaveAdminInfoServices;
use App\Services\Admin\SaveProductInfoServices;
use App\Services\users\SaveUserInfoServices;
use Illuminate\Http\Request;
use App\traits\upload_images;
use App\traits;

class RegisterControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use upload_images;


    public function index()
    {
//        return auth()->user(); //user sigin return data
//        return auth()->check();//check sigin 1
//        return auth()->id();//id sigin
        return view('Auth.sigup');

    }

    public function save(AddAdminFromRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'client';
        $file = request()->file('image');

        if ($file == null) {
            $image_name = 'default.svg.png';
        } else {
            $image_name = $this->upload($file, 'users');//return folder and name
        }

        $user = SaveUserInfoServices::save($data);
        ImageModelSave::make($user->id, 'user', $image_name);
        // dd($data);


        return redirect('/sigin');
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
