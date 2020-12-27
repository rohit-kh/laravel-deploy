<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    public function index(Request $request){
        return  redirect("/login");
    }

    public function showLoginForm(Request $request){
        return view("home");
    }
}
