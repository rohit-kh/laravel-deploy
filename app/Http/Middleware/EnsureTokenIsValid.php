<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Tymon\JWTAuth\Facades\JWTAuth;

class EnsureTokenIsValid
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $jwtToken = isset($_COOKIE["JWT-TOKEN"]) ? $_COOKIE["JWT-TOKEN"] : '';
        if (isset($jwtToken) && !empty($jwtToken)) {
            $response = Http::get(URL::to("/") . "/api/auth/profile", ["token" => $jwtToken]);
            if ($response->successful()) {
                $request = $request->merge(["user" => $response->json()]);
                return $next($request);
            } else {
                return redirect('/signin');
            }
        } else {
            return redirect('/signin');
        }
    }

    public function guard()
    {
        return Auth::guard();
    }
}
