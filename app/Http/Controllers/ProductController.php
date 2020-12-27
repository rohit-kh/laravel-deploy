<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function __construct()
    {
    }

    public function showProducts(Request $request){
        return view("products");
    }

    public function showProductDetails(Request $request, $productId){
        return view("product-details", ["productId"=>$productId]);
    }
}
