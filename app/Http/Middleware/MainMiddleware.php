<?php

namespace App\Http\Middleware;

use App\Models\Cookie;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

class MainMiddleware
{

    public function handle($request,Closure $next){
        if(!@$_COOKIE['cookie_id']){
            $cookie_id = uniqid('kaj');
            setcookie("cookie_id", $cookie_id, strtotime("2040-01-19 03:14:07"));
            $cookie = Cookie::create([
                'cookie_id'=>$cookie_id,
                'ip'=>request()->ip()
            ]);
        }
        return $next($request);
    }
}
