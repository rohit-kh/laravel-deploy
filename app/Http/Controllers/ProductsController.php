<?php

namespace App\Http\Controllers;

use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->middleware("auth:api");
        $this->user = $this->guard()->user();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                "name" => "required|string|unique:products",
                "description" => "required|string",
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors()
            ], 400);
        }

        $product = new Products();
        $product->name = $request->name;
        $product->description = $request->description;
        if ($this->user->products()->save($product) &&
            $this->uploadProductImages($request, $product)
        ) {
            return response()->json($product);
        } else {
            return response()->json([
                "message" => "Oops, products cannot be saved"
            ], 400);
        }
    }


    protected function uploadProductImages(Request $request, Products $product)
    {
        $images = $request->file("image");
        $status = true;
        foreach ($images as $image) {
            $newName = strtotime(Carbon::now()) . rand() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("/product/images"), $newName);
            $productImage = new ProductImages();
            $productImage->name = $newName;
            $status = $product->productImages()->save($productImage);
        }
        return $status;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
