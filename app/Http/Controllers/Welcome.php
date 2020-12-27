<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Welcome extends Controller
{
//    public function index(Request $request){
//        dd(1);
//        return  redirect("/login");
//    }

    public function showLoginForm(Request $request){
        return view("home");
    }
}
