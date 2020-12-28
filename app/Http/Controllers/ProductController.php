<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function showProducts(Request $request){
        return view("products", ["user"=>$request->user]);
    }

    public function showProductDetails(Request $request, $productId){
        return view("product-details",
            [
                "productId"=>$productId,
                "user"=>$request->user
            ]);
    }
}
