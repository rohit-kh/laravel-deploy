<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;


class LogoutController extends Controller
{

    public function logout(Request $request){
        $jwtToken = $_COOKIE["JWT-TOKEN"];
        setcookie("JWT-TOKEN", "", time() - 86400);
        $response = Http::post(URL::to("/") . "/api/auth/logout", ["token" => $jwtToken]);
        if ($response->successful()) {
            return redirect('/signin');
        }
    }

}
