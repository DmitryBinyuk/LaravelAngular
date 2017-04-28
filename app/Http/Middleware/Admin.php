<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request. Check is User admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $b = Auth::user();
        $c = Auth::check();
        if (Auth::user()->is_admin == 1)
        {
            return $next($request);
        }

        return \Redirect::route('admin.login.get');

//        return redirect()->guest('/admin/login');
    }
}
