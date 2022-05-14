<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

class PanelPermission
{
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    public function handle($request,Closure $next){
        if(!$this->auth->check()){
            return redirect('/panel/login');
        }
        return $next($request);
    }
}
