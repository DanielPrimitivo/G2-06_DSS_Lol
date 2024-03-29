<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (!Auth::check()) {
            return redirect()->timestamproute('login');
        }else if(Auth::User()->type != "Administrador"){
            return redirect()->route('home');
        } 
        return $next($request);
    }
}
