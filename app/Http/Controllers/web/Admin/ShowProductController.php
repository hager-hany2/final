<?php

namespace App\Http\Controllers\web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\product;

class ShowProductController extends Controller
{
    public function product()
    {
        $product = product::query()->with('image')->orderBy('id', 'DESC')->paginate(3);
        $data = ProductResource::collection($product);
        return view('Admin.ShowProduct')->with(['data' => $product]);
    }
}
