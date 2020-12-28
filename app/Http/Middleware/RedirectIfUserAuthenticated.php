<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class RedirectIfUserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $jwtToken = isset($_COOKIE["JWT-TOKEN"]) ? $_COOKIE["JWT-TOKEN"] : '';
        if (isset($jwtToken) && !empty($jwtToken)) {
            $response = Http::get(URL::to("/") . "/api/auth/profile", ["token" => $jwtToken]);
            if ($response->successful()) {
                return redirect('/product');
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }
    }
}
