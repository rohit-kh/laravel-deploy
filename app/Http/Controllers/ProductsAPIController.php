<?php

namespace App\Http\Controllers;

use App\Models\ProductComments;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Type\Integer;

class ProductsAPIController extends Controller
{

    protected $user;
    protected $products;

    public function __construct()
    {
        $this->middleware("auth:api");
        $this->user = $this->guard()->user();
        $this->products = Products::with("images")->get();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->products->toArray());
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
                'price' => 'required|integer|min:1',
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
        $product->price = $request->price;
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
            $newName = strtotime(Carbon::now()) . rand() . ".". $image->getClientOriginalExtension();
            $image->move(public_path("/product/images"), $newName);
            $productImage = new ProductImages();
            $productImage->name = $newName;
            $status = $product->images()->save($productImage);
        }
        return $status;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::with("images")->findOrFail($id);
        $comments =  ProductComments::with("user")
            ->where("product_id", $id)
            ->orderBy("created_at","ASC")
            ->get();
        $products->comments = $comments;
        return $products;
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
    public function update(Request $request, Products $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
