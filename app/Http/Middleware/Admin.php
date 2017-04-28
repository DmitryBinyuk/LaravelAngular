<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Contracts\Auth\Guard;
//use Auth;

class Admin
{
//    protected $auth;
//
//    public function __construct(Guard $auth)
//    {
//        $this->auth = $auth;
//    }

    /**
     * Handle an incoming request. Check is User admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $b = $this->auth->user();
        $b = \Illuminate\Support\Facades\Auth::user();
//        $b = Auth::guard($guard)->user();
        $c = Auth::check();
        if (Auth::user()->is_admin == 1)
        {
            return $next($request);
        }

        return \Redirect::route('admin.login.get');

//        return redirect()->guest('/admin/login');
    }
}
