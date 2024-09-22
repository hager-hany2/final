<?php

namespace App\Http\Controllers\web\Admin;

use App\Actions\ImageModelSave;
use App\Http\Controllers\Controller;
use App\Http\Requests\web\Admin\AddProductFromRequest;
use App\Http\Requests\web\Auth\RegisterFromRequest;
use App\Models\product;
use App\Services\Admin\SaveAdminInfoServices;
use App\Services\Admin\SaveProductInfoServices;
use App\Services\users\SaveUserInfoServices;
use Illuminate\Http\Request;

;

use App\traits\upload_images;

class AddProductControllerResource extends Controller
{
    use upload_images;

    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('Admin.AddProduct');
    }


    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        return view('Admin.UpdateProduct');
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductFromRequest $request)
    {
        $data = $request->validated();

        $file = request()->file('image');
        $image_name = $this->upload($file, 'products');//return folder and name

        $user = SaveProductInfoServices::save($data);
        ImageModelSave::make($user->id, 'Product', $image_name);
        return redirect()->back()->with('success', 'Add product success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::query()->with('images')->find($id);
        return $product;
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
