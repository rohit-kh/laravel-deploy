<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    public function index(Request $request){
        return  redirect("/signin");
    }

    public function showSigninForm(Request $request){
        return view("signin");
    }

    public function showSignupForm(Request $request){
        return view("signup");
    }
}
