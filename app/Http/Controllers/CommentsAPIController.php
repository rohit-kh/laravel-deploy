<?php

namespace App\Http\Controllers;

use App\Models\ProductComments;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsAPIController extends Controller
{

    protected $user;
    protected $products;

    public function __construct(Products $products){
        $this->middleware("auth:api");
        $this->user = $this->guard()->user();
        $this->products = Products::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        if(!Products::find($productId)){
            return response()->json([
                "errors" => "Invalid product id."
            ], 400);
        }

        $validator = Validator::make($request->all(),
            [
                "comment" => "required|string|min:2|max:255",
            ]);
        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors()
            ], 400);
        }

        $comment = new ProductComments();
        $comment->comment = $request->comment;
        $comment->product_id = $productId;
        if ($this->user->comments()->save($comment)) {
            return response()->json($comment);
        } else {
            return response()->json([
                "message" => "Oops, comment cannot be saved."
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductComments  $productComments
     * @return \Illuminate\Http\Response
     */
    public function show(ProductComments $productComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductComments  $productComments
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductComments $productComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductComments  $productComments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductComments $productComments, $productId, $commentId)
    {
        if(!ProductComments::find($commentId)){
            return response()->json([
                "errors" => "Invalid request."
            ], 400);
        }
        $productComments = ProductComments::find($commentId);
        $validator = Validator::make($request->all(),
            [
                "comment" => "required|string|min:2|max:255",
            ]);
        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors()
            ], 400);
        }

        $productComments->comment = $request->comment;

        if ($this->user->comments()->save($productComments)) {
            return response()->json($productComments);
        } else {
            return response()->json([
                "message" => "Oops, comment cannot be saved."
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductComments  $productComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductComments $productComments)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
